<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetHotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
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

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete-account', [ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    Route::get('/vendors', [PetHotelController::class, 'index'])->name('vendor');
    Route::get('/vendors/{id}', [PetHotelController::class, 'detail'])->name('vendor.detail');
    Route::get('/vendors/{id}/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/vendors/{id}/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/vendors/{id}/booking/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/registerVendor', [PetHotelController::class, 'registerVendor'])->name('vendor.registration');
    Route::post('/registerVendor/create', [PetHotelController::class, 'storeRegistration'])->name('vendor.registration.store');
    Route::get('/booking', [BookingController::class, 'list'])->name('list');

    Route::post('/payments/pay/{booking}', [PaymentController::class, 'pay'])->name('payments.pay');
    Route::post('/payments/callback', [PaymentController::class, 'callback'])->name('payments.callback');

    Route::post('/booking/finish/{id}', [BookingController::class, 'finishBooking'])->name('booking.finish');
    Route::post('/booking/review', [BookingController::class, 'storeReview'])->name('booking.review');


    Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
    Route::patch('/pets/{pet}', [PetController::class, 'update'])->name('pets.update');
    Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');

    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::patch('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('/dashboard/vendor', [VendorController::class, 'index']);
    Route::get('/dashboard/vendor/order', [VendorController::class, 'order']);
    Route::get('/dashboard/vendor/order/detail', [VendorController::class, 'detail']);

    
    
});

Route::get('/admin', [AdminController::class, 'index']);
require __DIR__.'/auth.php';
