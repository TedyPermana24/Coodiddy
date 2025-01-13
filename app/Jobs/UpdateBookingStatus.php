<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateBookingStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $bookingId;  // Changed to public for easier access

    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    public function handle()
    {
        $booking = Booking::find($this->bookingId);

        if ($booking && $booking->status === 'pending') {
            $payment = Payment::where('booking_id', $this->bookingId)
                              ->where('status', 'paid')
                              ->first();

            if ($payment) {
                $booking->update(['status' => 'paid']);
            } else {
                $booking->update(['status' => 'failed']);
            }
        }
    }
}
