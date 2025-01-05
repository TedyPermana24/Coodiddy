<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPricing extends Model
{
    use HasFactory;

    

    public function PetHotel()
    {
        return $this->belongsTo(PetHotel::class, 'hotel_id', 'id');
    }
}

