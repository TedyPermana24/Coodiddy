<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'age',
    ];

    /**
     * Relasi ke tabel Users
     * Satu hewan dimiliki oleh satu pengguna
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel Bookings
     * Satu hewan dapat dipesan di banyak booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
