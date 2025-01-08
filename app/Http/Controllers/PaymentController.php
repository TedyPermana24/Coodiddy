<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{

    public function configureMidtrans()
{
        // // Set Midtrans configuration
        // Config::$serverKey = config('services.midtrans.server_key');
        // Config::$clientKey = config('services.midtrans.client_key');
        // Config::$isProduction = config('services.midtrans.is_production');
        // Config::$isSanitized = true; // Optional, sanitization
        // Config::$is3ds = true;       // Optional, 3DS secure
        
        // // return response()->json([
        // //     'message' => 'Midtrans configured successfully',
        // //     'server_key' => Config::$serverKey,
        // //     'client_key' => Config::$clientKey,
        // //     'is_production' => Config::$isProduction,
        // // ]);
    }

    public function pay(Request $request, $bookingId)
    {
        try {
            $booking = Booking::with('user')->findOrFail($bookingId);
    
            if ($booking->status !== 'pending') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Booking is not in pending status'
                ], 400);
            }
    
            // Konfigurasi Midtrans
            Config::$serverKey = config('services.midtrans.server_key');
            Config::$clientKey = config('services.midtrans.client_key');
            Config::$isProduction = (bool)config('services.midtrans.is_production');
            Config::$isSanitized = true;
            Config::$is3ds = true;
    
            if ($booking->user_id !== Auth::id()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized access'
                ], 403);
            }
    
            // Generate order ID
            $orderId = 'BOOKING-' . $booking->id . '-' . Str::random(5);
    
            // Setup Midtrans parameters tanpa membuat payment
            $snapParams = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $booking->total_price,
                ],
                'customer_details' => [
                    'first_name' => $booking->user->name,
                    'email' => $booking->user->email,
                    'phone' => $booking->user->phone ?? '',
                ],
                'item_details' => [[
                    'id' => $booking->id,
                    'price' => (int) $booking->total_price,
                    'quantity' => 1,
                    'name' => "Pet Hotel Booking #{$booking->id}",
                ]],
                'expiry' => [
                    'start_time' => now()->format('Y-m-d H:i:s O'),
                    'duration' => 10,
                    'unit' => 'minute'
                ]
            ];
    
            $snapToken = Snap::getSnapToken($snapParams);
    
            return response()->json([
                'status' => 'success',
                'order_id' => $orderId,
                'snap_token' => $snapToken,
                'redirect_url' => "https://app.sandbox.midtrans.com/snap/v1/transactions/{$snapToken}"
            ]);
    
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Payment processing failed'
            ], 500);
        }
    }

    public function callback(Request $request)
    {
        try {
            $notification = $request->all();
            Log::info('Received Midtrans callback', ['notification' => $notification]);

            // Validasi order_id
            if (!isset($notification['order_id']) || strpos($notification['order_id'], 'BOOKING-') !== 0) {
                throw new \Exception('Invalid order ID format');
            }

            DB::transaction(function () use ($notification) {
                // Ambil booking_id dari order_id
                $orderIdParts = explode('-', $notification['order_id']);
                if (count($orderIdParts) < 2) {
                    throw new \Exception('Invalid order ID format');
                }

                $bookingId = $orderIdParts[1];
                $booking = Booking::findOrFail($bookingId);

                // Update atau buat payment record
                if (($notification['transaction_status'] === 'capture' || $notification['transaction_status'] === 'settlement') && 
                $notification['fraud_status'] === 'accept') {
                    Payment::updateOrCreate(
                        ['order_id' => $notification['order_id']],
                        [
                            'booking_id' => $booking->id,
                            'amount' => $notification['gross_amount'],
                            'status' => $notification['transaction_status'],
                            'payment_type' => $notification['payment_type'] ?? null,
                            'transaction_id' => $notification['transaction_id'] ?? null,
                            'paid_at' => $notification['transaction_time'] ?? now(),
                        ]
                    );
                }

                // Update status booking
                if (in_array($notification['transaction_status'], ['settlement', 'capture']) &&
                    $notification['fraud_status'] === 'accept') {
                    $booking->update(['status' => 'paid']);
                } elseif ($notification['transaction_status'] === 'pending') {
                    $booking->update(['status' => 'pending']);
                } elseif ($notification['transaction_status'] === 'expire') {
                    $booking->update(['status' => 'expired']);
                } elseif ($notification['transaction_status'] === 'cancel') {
                    $booking->update(['status' => 'cancelled']);
                } else {
                    Log::warning('Unknown transaction status', [
                        'status' => $notification['transaction_status'],
                        'order_id' => $notification['order_id']
                    ]);
                }
            });

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Callback error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    

}