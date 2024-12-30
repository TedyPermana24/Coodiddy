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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade'); 
            $table->string('transaction_id')->nullable();
            $table->enum('gateway_name', ['midtrans', 'xendit', 'stripe', 'paypal', 'lainnya'])->default('lainnya');
            $table->text('payment_url')->nullable();
            $table->enum('callback_status', ['pending', 'success', 'failed'])->default('pending');
            $table->string('currency', 10)->default('IDR');
            $table->json('response_data')->nullable(); 
            $table->dateTime('expired_at')->nullable(); 
            $table->string('signature_key')->nullable(); 
            $table->enum('payment_status', ['pending', 'berhasil', 'gagal'])->default('pending'); 
            $table->decimal('total_amount', 10, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
