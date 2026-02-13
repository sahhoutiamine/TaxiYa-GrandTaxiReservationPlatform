<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;

// --- Public Routes ---
Route::get('/', [SearchController::class, 'index'])->name('home');
Route::post('/search', [SearchController::class, 'search'])->name('search');

// --- Driver Routes (M-connecté w Verified) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard dyal Driver
    Route::get('/driver/dashboard', [DriverController::class, 'dashboard'])->name('driver.dashboard');

    Route::get('/dashboard/createRide', [RideController::class, 'create'])->name('driver.create');
    Route::post('/dashboard/storeRide', [RideController::class, 'store'])->name('rides.store');

    Route::get('/search', [SearchController::class, 'showSearchPage'])->name('dashboard');
});

// --- Other Routes ---
Route::get('/driver/pending', function () {
    return view('driver.pending');
})->middleware(['auth'])->name('driver.pending');

Route::middleware('auth')->group(function () {
    Route::get('mybookings', [ReserveController::class, 'myBookings'])->name('mybookings');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('payment/{id}', [ReserveController::class, 'index'])->name('payment');
    Route::post('payment/{id}', [ReserveController::class, 'store'])->name('payment.process');

    // Driver Ride Management
    Route::get('/driver/rides/create', [RideController::class, 'create'])->name('rides.create');
    Route::post('/driver/rides', [RideController::class, 'store'])->name('rides.store');

    Route::post('reservations/{id}/rate', [ReserveController::class, 'rate'])->name('reservations.rate');
});
require __DIR__.'/auth.php';
Route::view('/dashboard', 'admin.dashboard');
Route::view('/drivers', 'admin.drivers');
Route::view('/travelers', 'admin.travelers');
Route::view('/rides', 'admin.rides');


Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/drivers', [AdminController::class, 'drivers'])->name('admin.drivers');
Route::get('/travelers', [AdminController::class, 'travelers'])->name('admin.travelers');
Route::get('/rides', [AdminController::class, 'rides'])->name('admin.rides');




