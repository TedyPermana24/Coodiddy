<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\HotelPricing;
use App\Models\Pet;
use App\Models\PetHotel;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        // Ambil data PetHotel beserta relasi additionalServices
        $pethotels = PetHotel::with('hotelPricings', 'additionalServices')->findOrFail($id);
        
        $contacts = Contact::where('user_id', auth()->id())->get();

        $pets = Pet::where('user_id', auth()->id())->get();
        // Kirim data ke view 'detailBooking'
        return view('detailBooking', compact('pethotels', 'contacts', 'pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Validasi input dari form
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

        // Ambil PetHotel yang sesuai dengan ID
        $petHotel = PetHotel::with('additionalServices')->findOrFail($id);

        // Hitung total harga
        $basePrice = $hotelPricing->price_per_day * $days;
        $additionalServicePrice = 0;
        
        $servicePrices = [];
        if ($request->has('additional_services')) {
            foreach ($request->additional_services as $serviceName) {
                $service = $petHotel->additionalServices->where('service_name', $serviceName)->first();
                if ($service) {
                    $servicePrices[$serviceName] = $service->price;
                }
            }
        }
        
        // Menambahkan biaya pengantaran (pickup/dropoff)
        $deliveryPrice = ($request->pickup_dropoff == 'Pick Up') ? 10000 : 0;

        // Total harga
        $totalPrice = $basePrice + $additionalServicePrice + $deliveryPrice;

        $bookingDetails = [
            'days' => $request->days,
            'pickup_dropoff' => $request->pickup_dropoff,
            'additional_services' => $request->additional_services,
        ];

        // Membuat booking baru
        $booking = new Booking();
        $booking->user_id = auth()->id();
        $booking->pet_id = $pet->id;
        $booking->pet_hotel_id = $petHotel->id; // Pet hotel yang sedang diakses
        $booking->hotel_pricing_id = $hotelPricing->id;
        $booking->contact_id = $contact->id;
        $booking->additional_services = json_encode($request->additional_services);
        $booking->delivery = $request->pickup_dropoff;
        $booking->check_in_date = now();
        $booking->check_out_date = now()->addDays($days);
        $booking->total_price = $totalPrice;
        $booking->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('booking', ['id' => $petHotel->id])
        ->with('bookingDetails', $bookingDetails)
        ->with('servicePrices', $servicePrices)
        ->with('success', 'Booking successfully created.');;
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
