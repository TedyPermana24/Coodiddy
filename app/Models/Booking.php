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
        'hotel_pricing_id',
        'contact_id',
        'additional_services',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
    ];

    protected $casts = [
        'additional_services' => 'array', // Mengkonversi kolom JSON menjadi array
        'total_price' => 'decimal:2', // Menyimpan harga total dalam format desimal
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime',
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

    public function hotelPricing()
    {
        return $this->belongsTo(HotelPricing::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Relasi ke tabel Payments
     * Satu booking dapat memiliki banyak pembayaran
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Mengakses layanan tambahan (dari JSON)
    public function getAdditionalServicesAttribute($value)
    {
        return json_decode($value, true);
    }

    // Menyimpan layanan tambahan (sebelum disimpan ke database)
    public function setAdditionalServicesAttribute($value)
    {
        $this->attributes['additional_services'] = json_encode($value);
    }

    // Hitung total harga booking (harga dasar + harga layanan tambahan)
    public function calculateTotalPrice()
    {
        // Harga dasar dari hotel pricing
        $basePrice = $this->hotelPricing->price;

        // Hitung harga layanan tambahan
        $additionalServicesTotal = 0;
        if ($this->additional_services) {
            foreach ($this->additional_services as $service) {
                $additionalServicesTotal += $service['price']; // Mengambil harga dari layanan tambahan
            }
        }

        // Total harga = harga dasar + harga layanan tambahan
        return $basePrice + $additionalServicesTotal;
    }

    
}
