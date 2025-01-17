<?php

namespace App\Http\Controllers;

use App\Models\PetHotel;
use App\Models\RegistrationVendor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $registration = RegistrationVendor::with(['user', 'petHotel'])->get();
        return view('dashboardAdmin', compact('registration'));
    }

    public function detail($id)
    {
        $registration = RegistrationVendor::with([
        'user', 
        'petHotel.petHotelImages',
        'petHotel.hotelPricings',  
        'petHotel.additionalServices'
        ])->findOrFail($id);

        // dd($registration);
        return view('dashboardAdminDetail', compact('registration'));
    }

    public function accept($id)
    {
        $hotel = PetHotel::whereHas('registrationVendor', function($query) use ($id) {
            $query->where('id', $id);
        })->firstOrFail(); // Gunakan firstOrFail untuk memastikan kita mendapatkan satu entitas
    
        // Ubah status PetHotel menjadi 'active'
        $hotel->status = 'active';
        $hotel->save(); // Pastikan ini adalah objek model tunggal
    
        // Temukan RegistrationVendor yang berelasi dengan PetHotel
        $registration = $hotel->registrationVendor; // Mengambil relasi yang ada dengan RegistrationVendor
        $registration->registration_status = 'accepted';
        $registration->save();
    

        $user = $registration->user; // Mengambil User yang berelasi langsung dengan RegistrationVendor
        $user->role = 'vendor'; // Ubah role user menjadi 'vendor'
        $user->save(); // Simpan perubahan pada User
    
        // Redirect dengan pesan sukses
        // dd($hotel, $registration, $user);
        return redirect()->route('admin.registration')->with('success', 'Vendor activated and registration accepted.');
    }
    

    // Reject the registration
    public function reject($id)
    {
        $registration = RegistrationVendor::findOrFail($id);
        $registration->registration_status = 'rejected';
        $registration->save();

        return redirect()->route('admin.registration')->with('error', 'Registration rejected.');
    }
}
