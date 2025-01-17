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
        Schema::create('additional_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id'); // Relasi ke pet_hotel
            $table->string('service_name'); // Nama layanan tambahan
            $table->integer('price'); // Harga layanan tambahan
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('hotel_id')->references('id')->on('pet_hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_services');
    }
};
