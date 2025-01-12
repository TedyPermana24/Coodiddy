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
        Schema::create('pet_hotel_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id'); 
            $table->string('main_image'); // Foto utama
            $table->string('image_1')->nullable();    // Foto tambahan 1
            $table->string('image_2')->nullable();    // Foto tambahan 2
            $table->string('image_3')->nullable();    // Foto tambahan 3
            $table->timestamps();

            // Foreign key ke tabel pethotels
            $table->foreign('hotel_id')->references('id')->on('pet_hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pet_hotel_images');
    }
};
