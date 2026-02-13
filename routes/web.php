<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



// --- 1. Public Routes ---
Route::get('/', [SearchController::class, 'index'])->name('home');

// Search functionality
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/search', function (\Illuminate\Http\Request $request) {
    return redirect()->route('search', $request->all());
});


// --- 2. Authenticated Routes (Travelers & General) ---
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboards
Route::get('/traveler/dashboard', [SearchController::class, 'search'])->middleware(['auth', 'verified'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Booking & Payments
    Route::get('/mybookings', [ReserveController::class, 'myBookings'])->name('mybookings');
    Route::get('/payment/{id}', [ReserveController::class, 'index'])->name('payment');
    Route::post('/payment/{id}', [ReserveController::class, 'store'])->name('payment.process');
    Route::post('/reservations/{id}/rate', [ReserveController::class, 'rate'])->name('reservations.rate');

    // --- 3. Driver Routes ---
    // Note: You can add a 'driver' middleware here if you have one
    Route::prefix('driver')->group(function () {
        Route::get('/pending', function () {
            return view('driver.pending');
        })->name('driver.pending');

        // Create and Store Rides
        Route::get('/rides/create', [RideController::class, 'create'])->name('driver.create');
        Route::post('/rides/store', [RideController::class, 'store'])->name('rides.store');
    });
});


Route::middleware(['auth','verified'])->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

    Route::get('/drivers', [AdminController::class,'drivers'])->name('drivers');

    Route::get('/travelers', [AdminController::class,'travelers'])->name('travelers');

    Route::get('/rides', [AdminController::class,'rides'])->name('rides');

});
require __DIR__ . '/auth.php';
