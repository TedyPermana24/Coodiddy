<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetHotelImages extends Model
{
    protected $fillable = [
        'hotel_id',
        'main_image',
        'image_1',
        'image_2',
        'image_3',
    ];

    public function petHotel()
    {
        return $this->belongsTo(PetHotel::class, 'hotel_id');
    }
}
