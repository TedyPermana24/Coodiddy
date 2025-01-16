<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateBookingStatus;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\HotelPricing;
use App\Models\Pet;
use App\Models\PetHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $petHotel = PetHotel::with(['hotelPricings', 'additionalServices'])->findOrFail($id);
        $pets = Pet::where('user_id', Auth::id())->get();
        $contacts = Contact::where('user_id', Auth::id())->get();
        
        // Get active booking if exists
        $activeBooking = $this->getActiveBooking($id);

        return view('detailBooking', compact('petHotel', 'pets', 'contacts', 'activeBooking'));
    }

    // BookingController
    public function store(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'hotel_pricing_id' => 'required|exists:hotel_pricings,id',
            'address_id' => 'required|exists:contacts,id',
            'days' => 'required|integer|min:1',
            'pickup_dropoff' => 'required|in:Pick Up,Drop Off',
            'additional_services' => 'nullable|array',
        ]);

        // Ambil data dari input form
        $pet = Pet::findOrFail($request->pet_id);
        $hotelPricing = HotelPricing::findOrFail($request->hotel_pricing_id);
        $contact = Contact::findOrFail($request->address_id);
        $days = (int) $request->days;

        $petHotel = PetHotel::with('additionalServices')->findOrFail($id);

        // Hitung total harga
        $basePrice = $hotelPricing->price_per_day * $days;
        $additionalServicePrice = 0;
        $selectedServices = [];

        if ($request->has('additional_services')) {
            foreach ($request->additional_services as $serviceName) {
                $service = $petHotel->additionalServices->where('service_name', $serviceName)->first();
                if ($service) {
                    $selectedServices[] = [
                        'name' => $serviceName,
                        'price' => $service->price
                    ];
                    $additionalServicePrice += $service->price;
                }
            }
        }

        $deliveryPrice = ($request->pickup_dropoff == 'Pick Up') ? 10000 : 0;
        $totalPrice = $basePrice + $additionalServicePrice + $deliveryPrice;
        

        // Membuat booking baru
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->pet_id = $pet->id;
        $booking->pet_hotel_id = $petHotel->id;
        $booking->hotel_pricing_id = $hotelPricing->id;
        $booking->contact_id = $contact->id;
        $booking->additional_services = json_encode($request->additional_services);
        $booking->delivery = $request->pickup_dropoff;
        $booking->check_in_date = now();
        $booking->check_out_date = now()->addDays($days);
        $booking->total_price = $totalPrice;
        $booking->status = 'pending';
        $booking->save();
        
        // Buat summary booking
        $expiryTime = now()->addMinutes(10);
        $bookingSummary = [
            'pet_name' => $pet->pet_name,
            'price_per_day' => $hotelPricing->price_per_day,
            'days' => $days,
            'base_price' => $basePrice,
            'selected_services' => $selectedServices,
            'delivery_type' => $request->pickup_dropoff,
            'delivery_price' => $deliveryPrice,
            'total_price' => $totalPrice,
            'booking_id' => $booking->id,
            'expiry_time' => $expiryTime->format('Y-m-d H:i:s'),
            'expiry_timestamp' => $expiryTime->timestamp * 1000,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ];

        $cacheKey = 'booking_summary_' . Auth::id() . '_' . $id;
        cache()->put($cacheKey, $bookingSummary, $expiryTime);

        dispatch(new UpdateBookingStatus($booking->id))->delay($expiryTime);

        return redirect()->route('booking', ['id' => $petHotel->id])
            ->with('bookingSummary', $bookingSummary)
            ->with('success', 'Booking successfully created.');
    }



    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
    
        // Cek apakah booking statusnya 'paid'
        if ($booking->status === 'paid') {
            // Tambahkan total_price pada balance di tabel users
            $user = $booking->user; // Ambil pengguna yang melakukan booking
            
            // Tambahkan total_price pada balance pengguna
            $user->balance += $booking->total_price;
            $user->save(); // Simpan perubahan balance
            
            // Update status booking menjadi 'cancelled'
            $booking->update(['status' => 'cancelled']);
            
            return redirect()->back()->with('success', 'Booking cancelled and balance updated successfully.');
        }
        
        // Jika statusnya 'pending', hanya update statusnya menjadi 'cancelled'
        if ($booking->status === 'pending') {
            $booking->update(['status' => 'cancelled']);
            return redirect()->back()->with('success', 'Booking cancelled successfully.');
        }

        // Jika status booking bukan 'paid' atau 'pending'
        return redirect()->back()->with('error', 'Unable to cancel this booking.');
    }

    private function getActiveBooking($petHotelId)
    {
        $cacheKey = 'booking_summary_' . Auth::id() . '_' . $petHotelId;
        $bookingSummary = cache()->get($cacheKey);
        
        if ($bookingSummary) {
            // Check if the booking is still valid
            $booking = Booking::find($bookingSummary['booking_id']);
            if ($booking && in_array($booking->status, ['pending'])) {
                return $bookingSummary;
            } else {
                // Clear invalid booking from cache
                cache()->forget($cacheKey);
            }
        }
        
        return null;
    }

    public function list(Request $request)
    {
        $filter = $request->get('status', 'all');
        $search = $request->get('search');

        $pendingCount = Booking::where('user_id', Auth::id())
        ->where('status', 'pending')
        ->count();
    
        $bookingsQuery = Booking::with(['pethotel', 'pet', 'petHotel.PetHotelImages'])
            ->where('user_id', Auth::id());
    
        // Tambahkan kondisi search
        if ($search) {
            $bookingsQuery->whereHas('pethotel', function($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('pet', function($query) use ($search) {
                $query->where('pet_type', 'like', '%' . $search . '%');
            })
            ->orWhere('check_in_date', 'like', '%' . $search . '%')
            ->orWhere('check_out_date', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->orWhere('total_price', 'like', '%' . $search . '%');
        }
    
        // Terapkan filter berdasarkan status
        if ($filter !== 'all') {
            $bookingsQuery->where('status', $filter);
        }
    
        // Urutkan berdasarkan status dan check_in_date
        $bookingsQuery->orderByRaw("
            CASE 
                WHEN status = 'pending' THEN 1
                WHEN status = 'paid' THEN 2
                WHEN status = 'completed' THEN 3
                WHEN status = 'reviewed' THEN 4
                WHEN status = 'cancelled' THEN 5
                ELSE 6
            END
        ")->orderBy('check_in_date', 'desc');
    
        // Ambil data bookings
        $bookings = $bookingsQuery->get();
        
    
        // Map data untuk dikirim ke view
        $data = $bookings->map(function ($booking) {
            return [
                'booking_id' => $booking->id,
                'images' => $booking->pethotel->pethotelimages->first()->main_image,
                'hotel_id' => $booking->pethotel->id,
                'name' => $booking->pethotel->name,
                'additional_service' => json_decode($booking->additional_services, true),
                'pet_type' => $booking->pet->pet_type,
                'duration' => $booking->check_in_date->diffInDays($booking->check_out_date),
                'status' => $booking->status,
                'check_in_date' => $booking->check_in_date->format('F j, Y'),
                'total_price' => number_format($booking->total_price, 0, ',', '.'),
                'check_out_date' => $booking->check_out_date->format('F j, Y'),
            ];
        });

        return view('listPembayaran', [
            'bookings' => $data,
            'filter' => $filter,
            'pendingCount' => $pendingCount,
            'search' => $search, // tambahkan search ke view
        ]);
    }

    public function finishBooking($id)
    {
        // Cari booking berdasarkan ID dan pastikan statusnya 'processed'
        $booking = Booking::where('id', $id)->where('status', 'processed')->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found or invalid status!');
        }

        // Perbarui status booking menjadi 'completed'
        $booking->update([
            'status' => 'completed',
        ]);

        // Periksa apakah booking memiliki relasi dengan PetHotel
        if ($booking->petHotel) {
            // Tambahkan total_price ke balance PetHotel
            $booking->petHotel->increment('balance', $booking->total_price);
        }

        return redirect()->back()->with('success', 'Booking has been marked as completed and balance updated!');
    }


    public function storeReview(Request $request)
    {
         // Validasi input
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:255',
        ]);

        // Temukan booking dan hubungkan dengan pethotel
        $booking = Booking::with('pethotel')->find($validated['booking_id']);
        $pethotel = $booking->pethotel;

        if (!$pethotel) {
            return redirect()->back()->withErrors('Pet hotel not found.');
        }

        // Tambahkan review baru ke tabel reviews
        $review = $pethotel->reviews()->create([
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'user_id' => Auth::id(),
        ]);

        $booking->update(['status' => 'reviewed']);

        return redirect()->back()->with('success', 'Review submitted successfully.');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
