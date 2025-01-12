<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHotel extends Model
{
    use HasFactory;
    
    protected $table = 'pet_hotels';
    protected $fillable = [
        'owner_id',
        'name',
        'location',
        'description',
        'address',
        'phone',
        'rating',
    ];

    public function hotelPricings()
    {
        return $this->hasMany(HotelPricing::class, 'hotel_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'hotel_id', 'id');
    }

    public function additionalServices()
    {
        return $this->hasMany(AdditionalService::class, 'hotel_id');
    }

    public function petHotelImages()
    {
        return $this->hasMany(PetHotelImages::class, 'hotel_id');
    }

    public function registrationVendor()
    {
        return $this->hasMany(RegistrationVendor::class, 'pet_hotel_id');
    }
}
