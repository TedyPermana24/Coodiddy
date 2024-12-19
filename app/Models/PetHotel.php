<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'rating',
    ];

    /**
     * Relasi ke tabel HotelPricing
     * Satu hotel memiliki banyak harga layanan
     */
    public function pricings()
    {
        return $this->hasMany(HotelPricing::class);
    }

    /**
     * Relasi ke tabel Bookings
     * Satu hotel memiliki banyak booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Relasi ke tabel Reviews
     * Satu hotel memiliki banyak ulasan
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
