<?php

namespace App\Http\Controllers;

use App\Models\HotelPricing;
use App\Models\PetHotel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');   // Input pencarian
        $species = $request->input('species'); // Input filter spesies
        $location = $request->input('location'); // Input filter lokasi
        $price_min = $request->input('price_min'); // Input harga minimum
        $price_max = $request->input('price_max'); // Input harga maksimum

        // Ambil minimum dan maksimum harga dari seluruh data
        $globalMinPrice = HotelPricing::min('price_per_day');
        $globalMaxPrice = HotelPricing::max('price_per_day');

        // Query dasar untuk mendapatkan daftar pet hotels
        $pethotels = PetHotel::query()
            ->with(['hotelPricings']) // Relasi ke tabel hotel_pricings
            ->withAvg('reviews', 'rating') // Hitung rata-rata rating
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($location, function ($query, $location) {
                // Aktifkan filter lokasi jika dipilih
                return $query->where('location', $location);
            })
            ->get();

        // Proses data untuk menampilkan harga dan spesies
        $pethotels->each(function ($hotel) use ($species, $price_min, $price_max) {
            // Gabungkan semua spesies untuk ditampilkan di kartu
            $hotel->species = $hotel->hotelPricings->pluck('species')->unique()->implode(', ');

            // Aktifkan filter spesies jika ada spesies yang dipilih
            $filteredPricings = $species
                ? $hotel->hotelPricings->where('species', $species)
                : $hotel->hotelPricings;

            // Filter berdasarkan range harga
            if ($filteredPricings->isNotEmpty()) {
                $filteredPricings = $filteredPricings->filter(function ($pricing) use ($price_min, $price_max) {
                    return (!$price_min || $pricing->price_per_day >= $price_min) &&
                        (!$price_max || $pricing->price_per_day <= $price_max);
                });
            }

            $hotel->min_price = $filteredPricings->isNotEmpty()
                ? $filteredPricings->min('price_per_day')
                : null;
        });

        // Filter hotel berdasarkan harga valid
        $pethotels = $pethotels->filter(function ($hotel) {
            return $hotel->min_price !== null;
        });

        // Ambil daftar spesies unik dari tabel hotel_pricings
        $speciesList = HotelPricing::select('species')
            ->distinct()
            ->pluck('species');

        // Ambil daftar lokasi unik dari tabel pet_hotels
        $locationList = PetHotel::select('location')
            ->distinct()
            ->pluck('location');

        return view('dashboard', [
            'pethotels' => $pethotels,
            'search' => $search,
            'species' => $species,
            'location' => $location,
            'price_min' => $price_min,
            'price_max' => $price_max,
            'speciesList' => $speciesList,
            'locationList' => $locationList,
            'globalMinPrice' => $globalMinPrice,
            'globalMaxPrice' => $globalMaxPrice,
        ]);
    }


    public function detail($id)
    {
        // Ambil data PetHotel dengan harga, rata-rata rating, dan review lengkap
        $pethotels = PetHotel::with([
            'hotelPricings' => function ($query) {
                $query->select('hotel_id', 'price_per_day', 'species');
            },
            'reviews.user' // Relasi ke tabel users melalui reviews
        ])
        ->withAvg('reviews', 'rating') // Ambil rata-rata rating dari review
        ->findOrFail($id);
    
        // Hitung jumlah review
        $totalReviews = $pethotels->reviews->count();
    
        // Ambil data review dengan nama user, tanggal, dan isi review
        $reviews = $pethotels->reviews->map(function ($review) {
            return [
                'name' => $review->user->name, // Ambil nama dari relasi user
                'date' => Carbon::parse($review->created_at)->translatedFormat('j F Y'), // Format tanggal
                'review' => $review->review, // Isi review
                'rating' => $review->rating, // Tambahkan rating jika ada
            ];
        });
    
        // Kirim data ke view
        return view('detailVendor', compact('pethotels', 'totalReviews', 'reviews'));
    }
    


    public function recommendation()
    {
        
    }

    public function registerVendor()
    {
        return view('registerVendor');
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
