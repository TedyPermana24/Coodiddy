<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationVendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_id',
        'owner_name', 
        'id_photo',
        'user_photo',
        'registration_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petHotel()
    {
        return $this->belongsTo(PetHotel::class, 'pet_hotel_id');
    }
}
