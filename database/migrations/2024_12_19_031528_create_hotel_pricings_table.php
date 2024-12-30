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
        Schema::create('hotel_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('pet_hotels')->onDelete('cascade');
            $table->enum('species', ['anjing', 'kucing', 'kelinci', 'burung', 'lainnya']);
            $table->decimal('price_per_day', 10, 2);
            $table->string('additional_service')->nullable();
            $table->decimal('service_price', 10, 2)->nullable();
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
