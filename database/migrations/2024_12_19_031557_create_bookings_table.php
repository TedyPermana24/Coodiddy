<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan users
            $table->foreignId('pet_id')->constrained()->onDelete('cascade'); // Relasi dengan pets
            $table->foreignId('pet_hotel_id')->constrained()->onDelete('cascade'); // Relasi dengan pet_hotels
            $table->foreignId('hotel_pricing_id')->constrained()->onDelete('cascade'); // Relasi dengan hotel_pricings
            $table->foreignId('contact_id')->constrained()->onDelete('cascade'); // Relasi dengan contacts
            $table->json('additional_services')->nullable(); // Layanan tambahan dalam format JSON
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->decimal('total_price', 10, 2); // Total harga (harga dasar + layanan tambahan)
            $table->enum('status', ['pending', 'paid', 'failed', 'completed'])->default('pending'); // Status pemesanan
            $table->timestamps(); // Tanggal pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
