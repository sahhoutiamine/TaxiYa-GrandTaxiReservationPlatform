<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReserveController;


Route::get('/', [SearchController::class, 'index'])->name('home');

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::get('/search', [SearchController::class, 'showSearchPage'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/driver/dashboard', [DriverController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('driver.dashboard');

Route::get('/driver/pending', function () {
    return view('driver.pending');
})->middleware(['auth'])->name('driver.pending');

Route::middleware('auth')->group(function () {
    Route::view('mybookings', 'traveler.mybookings')->name('mybookings');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('payment/{id}', [ReserveController::class, 'index'])->name('payment');
    Route::post('payment/{id}', [ReserveController::class, 'store'])->name('payment.process');
    
    // Driver Ride Management
    Route::get('/driver/rides/create', [RideController::class, 'create'])->name('rides.create');
    Route::post('/driver/rides', [RideController::class, 'store'])->name('rides.store');
});


require __DIR__ . '/auth.php';
