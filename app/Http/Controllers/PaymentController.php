<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    // public function createPayment(Request $request, $bookingId)
    // {
    //     $booking = Booking::findOrFail($bookingId);

    //     // Ensure the authenticated user owns the booking
    //     if ($booking->user_id !== Auth::id()) {
    //         abort(403, 'Unauthorized');
    //     }

    //     // Midtrans Configuration
    //     Config::$serverKey = env('MIDTRANS_SERVER_KEY'); // Atau config('services.midtrans.server_key');
    //     Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false); // Atau config('services.midtrans.is_production');
    //     Config::$isSanitized = true;
    //     Config::$is3ds = true;

    //     // Prepare payment details
    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => 'BOOK-' . $booking->id,
    //             'gross_amount' => $booking->total_price,
    //         ],
    //         'customer_details' => [
    //             'first_name' => Auth::user()->name,
    //             'email' => Auth::user()->email,
    //         ],
    //     ];

    //     // Generate Snap Token
    //     $snapToken = Snap::getSnapToken($params);

    //     // Save payment record
    //     $payment = Payment::create([
    //         'user_id' => Auth::id(),
    //         'booking_id' => $booking->id,
    //         'total_amount' => $booking->total_price,
    //         'transaction_id' => $params['transaction_details']['order_id'],
    //         'expired_at' => now()->addHours(1),
    //     ]);

    //     return view('payments.pay', compact('snapToken', 'payment'));
    // }

    // /**
    //  * Handle Midtrans payment callback.
    //  */
    // public function handleCallback(Request $request)
    // {
    //     $transactionStatus = $request->transaction_status;
    //     $orderId = $request->order_id;

    //     $payment = Payment::where('transaction_id', $orderId)->firstOrFail();

    //     if ($transactionStatus === 'capture' || $transactionStatus === 'settlement') {
    //         $payment->update(['payment_status' => 'success']);
    //         $payment->booking->update(['status' => 'paid']);
    //     } elseif ($transactionStatus === 'expire' || $transactionStatus === 'cancel') {
    //         $payment->update(['payment_status' => 'failed']);
    //     }

    //     return response()->json(['message' => 'Callback processed successfully.']);
    // }
}
