<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

// --- Public Routes ---
Route::get('/', [SearchController::class, 'index'])->name('home');
Route::post('/search', [SearchController::class, 'search'])->name('search');

// --- Driver Routes (M-connecté w Verified) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard dyal Driver
    Route::get('/driver/dashboard', [DriverController::class, 'dashboard'])->name('driver.dashboard');

    // Create Ride (L-khedma li drna daba)
    Route::get('/dashboard/createRide', [RideController::class, 'create'])->name('driver.create');
    Route::post('/dashboard/storeRide', [RideController::class, 'store'])->name('rides.store');

    // Search Page (mn GitHub)
    Route::get('/search', [SearchController::class, 'showSearchPage'])->name('dashboard');
});

// --- Other Routes ---
Route::get('/driver/pending', function () {
    return view('driver.pending');
})->middleware(['auth'])->name('driver.pending');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';