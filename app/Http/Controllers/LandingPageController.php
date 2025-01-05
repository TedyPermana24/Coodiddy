<?php

namespace App\Http\Controllers;

use App\Models\PetHotel;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $pethotels = PetHotel::with(['hotelPricings' => function ($query) {
            $query->select('hotel_id', 'price_per_day', 'species'); // Sesuaikan dengan kolom tabel
        }])
        ->orderBy('ratings', 'desc') // Urutkan berdasarkan rating
        ->take(10) // Ambil hanya 4 data
        ->get();
    
        // Mengirim data ke view
        // dd($pethotels);

        return view('welcome', ['pethotels' => $pethotels]);
    }
}
