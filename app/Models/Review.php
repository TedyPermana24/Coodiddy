<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_hotel_id',
        'rating',
        'review',
    ];

    /**
     * Relasi ke tabel Users
     * Satu ulasan dibuat oleh satu pengguna
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel PetHotels
     * Satu ulasan terkait dengan satu hotel
     */
    public function petHotel()
    {
        return $this->belongsTo(PetHotel::class);
    }
}
