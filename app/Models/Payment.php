<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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

    /**
     * Relasi ke tabel Bookings
     * Satu pembayaran terhubung dengan satu booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
