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
        Schema::create('hotel_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('pet_hotels')->onDelete('cascade');
            $table->enum('species', ['Cat', 'Dogs']);
            $table->integer('price_per_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_pricings');
    }
};
