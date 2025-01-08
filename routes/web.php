<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PetHotelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('detailBooking');
});

// Route::get('/user-page', function () {
//     return view('user');
// })->middleware(['auth', 'role:admin']);
// TESTING MIDDLEWARE

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::get('/list', function () {
    return view('listPembayaran');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/vendors', [PetHotelController::class, 'index'])->name('vendor');
    Route::get('/vendors/{id}', [PetHotelController::class, 'detail'])->name('vendor.detail');
    Route::get('/vendors/{id}/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/vendors/{id}/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/vendors/{id}/booking/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/registerVendor', [PetHotelController::class, 'registerVendor'])->name('registerVendor');
    Route::get('/booking', [BookingController::class, 'list'])->name('list');

    Route::post('/payments/pay/{booking}', [PaymentController::class, 'pay'])->name('payments.pay');
    Route::post('/payments/callback', [PaymentController::class, 'callback'])->name('payments.callback');

    Route::post('/booking/finish/{id}', [BookingController::class, 'finishBooking'])->name('booking.finish');
    Route::post('/booking/review', [BookingController::class, 'storeReview'])->name('booking.review');

    
});

require __DIR__.'/auth.php';
