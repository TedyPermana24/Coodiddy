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
        ->withAvg('reviews', 'rating') // Mengambil rata-rata rating dari tabel reviews
        ->orderBy('reviews_avg_rating', 'desc') // Urutkan berdasarkan rata-rata rating
        ->take(10) // Ambil hanya 10 data
        ->get();

        // Mengirim data ke view
        return view('welcome', ['pethotels' => $pethotels]);
    }
}
