<?php

namespace App\Http\Controllers;

use App\Models\PetHotel;
use App\Models\RegistrationVendor;
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
        $registration = RegistrationVendor::findOrFail($id);
        $registration->registration_status = 'accepted';
        $registration->save();

        $hotels = PetHotel::findOrFail($id);
        $hotels->status = 'active';
        $hotels->save();

        return redirect()->route('admin.registration')->with('success', 'Registration accepted.');
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
