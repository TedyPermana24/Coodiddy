<?php

namespace App\Http\Controllers;

use App\Models\HotelPricing;
use App\Models\PetHotel;
use Illuminate\Http\Request;

class PetHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian
        $price = $request->input('price');   // Filter harga
        $species = $request->input('species'); // Filter jeniss
        $location = $request->input('location'); // Filter lokasi

        // Query dasar
        $pethotels = PetHotel::query()
            ->with(['hotelPricings' => function ($query) use ($species) {
                if ($species) {
                    $query->where('species', $species);
                }
            }])
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($location, function ($query, $location) {
                return $query->where('location', $location);
            })
            ->when($price, function ($query, $price) {
                if ($price === 'low') {
                    // Order by the minimum price per hotel
                    $query->addSelect([
                        'min_price' => HotelPricing::select('price_per_day')
                            ->whereColumn('pet_hotels.id', 'hotel_pricings.hotel_id')
                            ->orderBy('price_per_day', 'asc')
                            ->limit(1),
                    ])->orderBy('min_price', 'asc');
                } elseif ($price === 'high') {
                    // Order by the maximum price per hotel
                    $query->addSelect([
                        'max_price' => HotelPricing::select('price_per_day')
                            ->whereColumn('pet_hotels.id', 'hotel_pricings.hotel_id')
                            ->orderBy('price_per_day', 'desc')
                            ->limit(1),
                    ])->orderBy('max_price', 'desc');
                }
            })
            ->get();

        // Ambil daftar species dan lokasi untuk dropdown
        $speciesList = HotelPricing::select('species')->distinct()->pluck('species');
        $locationList = PetHotel::select('location')->distinct()->pluck('location');

        return view('dashboard', [
            'pethotels' => $pethotels,
            'search' => $search,
            'price' => $price,
            'species' => $species,
            'location' => $location,
            'speciesList' => $speciesList,
            'locationList' => $locationList, // Kirim daftar lokasi ke view
        ]);
    }

    



    public function detail()
    {
        return view('detailVendor');
    }

    public function recommendation()
    {
        
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
