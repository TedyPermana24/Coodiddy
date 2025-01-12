<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'species',
        'price_per_day'
    ];

    public function PetHotel()
    {
        return $this->belongsTo(PetHotel::class, 'hotel_id', 'id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

