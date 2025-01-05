<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'transaction_id',
        'gateway_name',
        'payment_url',
        'payment_status',
        'total_amount',
    ];

    public function PetHotel()
    {
        return $this->belongsTo(PetHotel::class, 'hotel_id', 'id');
    }
}

