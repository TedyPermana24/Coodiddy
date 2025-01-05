<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalService extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'service_name',
        'price',
    ];

    /**
     * Relasi ke model PetHotel.
     */
    public function hotel()
    {
        return $this->belongsTo(PetHotel::class, 'hotel_id', 'id');
    }
}

