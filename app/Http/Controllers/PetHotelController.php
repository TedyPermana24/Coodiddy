<?php

namespace App\Http\Controllers;

use App\Models\AdditionalService;
use App\Models\HotelPricing;
use App\Models\PetHotel;
use App\Models\PetHotelImages;
use App\Models\RegistrationVendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            ->where('status', 'active') // Tambahkan kondisi untuk hanya mengambil pethotel dengan status active
            ->with(['hotelPricings', 'petHotelImages']) // Relasi ke tabel hotel_pricings
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
                'reviews.user', // Relasi ke tabel users melalui reviews
                'petHotelImages', 
            ])
            ->withAvg('reviews', 'rating') // Ambil rata-rata rating dari review
            ->where('status', 'active') // Tambahkan kondisi untuk hanya pethotel dengan status active
            ->findOrFail($id);
    
        // Hitung jumlah review
        $totalReviews = $pethotels->reviews->count();
    
        // Ambil data review dengan nama user, tanggal, dan isi review
        $reviews = $pethotels->reviews->map(function ($review) {
            return [
                'name' => $review->user->name, // Ambil nama dari relasi user
                'image' => $review->user->image,
                'date' => Carbon::parse($review->created_at)->translatedFormat('j F Y'), // Format tanggal
                'review' => $review->review, // Isi review
                'rating' => $review->rating, // Tambahkan rating jika ada
            ];
        });
    
        // Kirim data ke view
        return view('detailVendor', compact('pethotels', 'totalReviews', 'reviews'));
    }
    
    public function registerVendor()
    {
        $registration = Auth::user()->registration;
        
        if (!$registration) {
            return view('vendor-registration');
        }

        switch($registration->registration_status) {
            case 'accepted':
                return view('vendor-registration-accepted');
            case 'pending':
                return view('vendor-registration-pending');
            case 'rejected':
                return view('vendor-registration-rejected');
            default:
                return view('vendor-registration');
        }
    }

    public function storeRegistration(Request $request)
    {
        try {
            DB::beginTransaction();
            
            // Array to store uploaded file paths for potential cleanup
            $uploadedFiles = [];
            
            try {
                // Handle file uploads first
                $idPhotoPath = $request->file('id_photo')->store('vendor/id_photos', 'public');
                $uploadedFiles[] = $idPhotoPath;
                
                $ownerFacePath = $request->file('owner_face')->store('vendor/owner_faces', 'public');
                $uploadedFiles[] = $ownerFacePath;
                
                // Store vendor photos
                $mainImagePath = $request->file('vendor_photo_1')->store('vendor/hotels', 'public');
                $uploadedFiles[] = $mainImagePath;
                
                $image1Path = $request->file('vendor_photo_2')->store('vendor/hotels', 'public');
                $uploadedFiles[] = $image1Path;
                
                $image2Path = $request->file('vendor_photo_3')->store('vendor/hotels', 'public');
                $uploadedFiles[] = $image2Path;
                
                $image3Path = $request->file('vendor_photo_4')->store('vendor/hotels', 'public');
                $uploadedFiles[] = $image3Path;
        
            } catch (\Exception $e) {
                throw new \Exception('Failed to upload images: ' . $e->getMessage());
            }
        
            // Validate required data
            if (!$request->filled(['vendor_name', 'phone', 'address', 'description', 'owner_name']) || 
                !is_array($request->pet_types) || 
                !is_array($request->additional_services)) {
                throw new \Exception('Missing required fields');
            }
        
            try {
                // Create Pet Hotel
                $petHotel = PetHotel::create([
                    'owner_id' => Auth::id(),
                    'name' => $request->vendor_name,
                    'location' => $request->location,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'description' => $request->description
                ]);
        
                // Create Registration Vendor
                $registrationVendor = RegistrationVendor::create([
                    'hotel_id' => $petHotel->id,
                    'user_id' => Auth::id(),
                    'owner_name' => $request->owner_name,
                    'id_photo' => $idPhotoPath,
                    'user_photo' => $ownerFacePath,
                    'status' => 'pending'
                ]);
        
                // Create Pet Hotel Images
                PetHotelImages::create([
                    'hotel_id' => $petHotel->id,
                    'main_image' => $mainImagePath,
                    'image_1' => $image1Path,
                    'image_2' => $image2Path,
                    'image_3' => $image3Path
                ]);
        
                // Validate and create Hotel Pricings
                foreach ($request->pet_types as $petType) {
                    if (!isset($petType['type']) || !isset($petType['price'])) {
                        throw new \Exception('Invalid pet type data structure');
                    }
                    
                    HotelPricing::create([
                        'hotel_id' => $petHotel->id, // Changed from registrationVendor->id
                        'species' => $petType['type'],
                        'price_per_day' => $petType['price']
                    ]);
                }
        
                // Validate and create Additional Services
                foreach ($request->additional_services as $service) {
                    if (!isset($service['service_name']) || !isset($service['price'])) {
                        throw new \Exception('Invalid additional service data structure');
                    }
                    
                    AdditionalService::create([
                        'hotel_id' => $petHotel->id, // Changed from registrationVendor->id
                        'service_name' => $service['service_name'],
                        'price' => $service['price']
                    ]);
                }
        
                DB::commit();
                return redirect()->route('vendor.registration')->with('success', 'Vendor registration successful!');
        
            } catch (\Exception $e) {
                throw new \Exception('Failed to save data: ' . $e->getMessage());
            }
        
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Clean up uploaded files if any part of the transaction failed
            foreach ($uploadedFiles as $filePath) {
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        
            // Log the error for debugging
            Log::error('Vendor Registration Error: ' . $e->getMessage());
            
            // Return with specific error message based on the exception
            if (str_contains($e->getMessage(), 'Missing required fields')) {
                return back()->with('error', 'Please fill in all required fields.');
            } elseif (str_contains($e->getMessage(), 'Failed to upload images')) {
                return back()->with('error', 'Failed to upload images. Please try again.');
            } elseif (str_contains($e->getMessage(), 'Invalid pet type')) {
                return back()->with('error', 'Invalid pet type information provided.');
            } elseif (str_contains($e->getMessage(), 'Invalid additional service')) {
                return back()->with('error', 'Invalid additional service information provided.');
            }
            
            return back()->with('error', 'Registration failed. Please try again. Error: ' . $e->getMessage())
                ->withInput();
        }
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
