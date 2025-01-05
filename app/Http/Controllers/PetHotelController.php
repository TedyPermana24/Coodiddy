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
        $search = $request->input('search'); // Input pencarian
        $price = $request->input('price');   // Input filter harga
        $species = $request->input('species'); // Input filter spesies
        $location = $request->input('location'); // Input filter lokasi

        // Query untuk mendapatkan daftar pet hotels
        $pethotels = PetHotel::query()
            ->with(['hotelPricings' => function ($query) use ($species) {
                if ($species) {
                    $query->where('species', $species);
                }
            }])
            ->withAvg('reviews', 'rating') // Hitung rata-rata rating
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($location, function ($query, $location) {
                return $query->where('location', $location);
            })
            ->when($price, function ($query, $price) {
                if ($price === 'low') {
                    $query->addSelect([
                        'min_price' => HotelPricing::select('price_per_day')
                            ->whereColumn('pet_hotels.id', 'hotel_pricings.hotel_id')
                            ->orderBy('price_per_day', 'asc')
                            ->limit(1),
                    ])->orderBy('min_price', 'asc');
                } elseif ($price === 'high') {
                    $query->addSelect([
                        'max_price' => HotelPricing::select('price_per_day')
                            ->whereColumn('pet_hotels.id', 'hotel_pricings.hotel_id')
                            ->orderBy('price_per_day', 'desc')
                            ->limit(1),
                    ])->orderBy('max_price', 'desc');
                }
            })
            ->get();

        // Gabungkan data spesies menjadi string dan hitung harga minimum
        $pethotels->each(function ($hotel) {
            $hotel->species = $hotel->hotelPricings->pluck('species')->unique()->implode(', ');
            $hotel->min_price = $hotel->hotelPricings->min('price_per_day');
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
            'price' => $price,
            'species' => $species,
            'location' => $location,
            'speciesList' => $speciesList,
            'locationList' => $locationList,
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
