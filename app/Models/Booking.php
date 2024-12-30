<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'pet_hotel_id',
        'check_in_date',
        'check_out_date',
        'status',
        'total_price',
    ];

    /**
     * Relasi ke tabel Users
     * Satu booking dimiliki oleh satu pengguna
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel Pets
     * Satu booking terkait dengan satu hewan
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * Relasi ke tabel PetHotels
     * Satu booking dilakukan di satu hotel
     */
    public function petHotel()
    {
        return $this->belongsTo(PetHotel::class);
    }

    /**
     * Relasi ke tabel Payments
     * Satu booking dapat memiliki banyak pembayaran
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
