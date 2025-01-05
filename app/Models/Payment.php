<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'species',
        'price_per_day',
        'additional_service',
        'service_price',
        'created_at',
        'updated_at',
    ];

    /**
     * Relasi ke tabel Bookings
     * Satu pembayaran terhubung dengan satu booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
