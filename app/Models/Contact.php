<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'phone_number', 
        'address', 
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi belongsTo ke tabel users
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
