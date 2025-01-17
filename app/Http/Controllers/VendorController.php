<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\AdditionalService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
     public function index()
     {
         // Mengambil semua data booking beserta relasi
            $booking = Booking::with('petHotel', 'payments', 'pet', 'hotelPricing', 'user', 'contact')
            ->whereIn('status', ['paid', 'processed', 'completed', 'reviewed'])
            ->get();
     
         // Menambahkan kolom baru untuk selisih hari (diffInDays) di setiap data booking
         foreach ($booking as $b) {
             $b->days_difference = Carbon::parse($b->check_in_date)->diffInDays(Carbon::parse($b->check_out_date));
            
             $services = json_decode($b->additional_services, true);
             $b->additional_services_text = is_array($services) ? implode(', ', $services) : $b->additional_services;
        }
    
         return view('vendorOrder', compact('booking'));
     }
    public function detail($id){
        $booking = Booking::with('petHotel.hotelPricings', 'payments', 'pet', 'user', 'contact')
        ->where('id', $id)
        ->first();

    // Hitung selisih hari
    $booking->days_difference = Carbon::parse($booking->check_in_date)->diffInDays(Carbon::parse($booking->check_out_date));

    // Decode JSON additional_services
    $additionalServices = json_decode($booking->additional_services, true);

    // Ambil harga layanan dari tabel additional_services
    $servicesWithPrices = [];
    $totalServicePrice = 0;

    if (!empty($additionalServices)) {
        foreach ($additionalServices as $serviceName) {
            $service = AdditionalService::where('service_name', $serviceName)
                ->where('hotel_id', $booking->petHotel->id)
                ->first();

            if ($service) {
                $servicesWithPrices[] = [
                    'name' => $service->service_name,
                    'price' => $service->price,
                ];
                $totalServicePrice += $service->price; // Tambahkan harga layanan ke total
            }
        }
    }

    // Pass data ke view
    return view('detailOrder', compact('booking', 'servicesWithPrices', 'totalServicePrice'));
    }

    public function processed($id) {
        // Find the booking by its ID
        $booking = Booking::findOrFail($id);
    
        // Check the current status and update accordingly
        if ($booking->status == 'paid') {
            // If status is 'paid', change it to 'processed'
            $booking->status = 'processed';
            $message = 'Booking status has been updated to processed.';
        } elseif ($booking->status == 'processed') {
            // If status is 'processed', change it to 'completed'
            $booking->status = 'completed';
            $message = 'Booking status has been updated to completed.';

            $balance = $booking->total_price - 5000;
         
            // Update the pet_hotel's balance
            $petHotel = $booking->pethotel; // Assuming each booking is associated with a pet hotel
            $petHotel->balance += $balance; // Add the calculated balance to the current balance
            $petHotel->save(); // Save the updated pet hotel
        } else {
            // If the status is neither 'paid' nor 'processed', return with an error message
            return redirect()->route('dashboard.vendor.order.detail',['id' => $booking->id])
                             ->with('error', 'Booking status cannot be updated.');
        }
    
        // Save the changes to the database
        $booking->save();
    
        // Redirect back with the success message
        return redirect()->route('dashboard.vendor.order.detail', ['id' => $booking->id])
                         ->with('success', $message);
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
    public function store(Request $request)
    {
        //
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
