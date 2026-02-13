<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ReserveController;


Route::get('/', [SearchController::class, 'index'])->name('home');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/search', function (\Illuminate\Http\Request $request) {
    return redirect()->route('search', $request->all());
});
Route::get('/traveler/dashboard', [SearchController::class, 'search'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/driver/dashboard', [DriverController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('driver.dashboard');

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
    Route::post('/driver/rides/{id}/cancel', [RideController::class, 'cancel'])->name('rides.cancel');

    Route::post('reservations/{id}/rate', [ReserveController::class, 'rate'])->name('reservations.rate');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/drivers', [AdminController::class, 'drivers'])->name('admin.drivers');
    Route::get('/admin/travelers', [AdminController::class, 'travelers'])->name('admin.travelers');
    Route::get('/admin/rides', [AdminController::class, 'rides'])->name('admin.rides');
    Route::get('/admin/rides/{id}/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
    Route::post('/admin/drivers/{id}/verify', [AdminController::class, 'verifyDriver'])->name('admin.drivers.verify');
    Route::post('/admin/drivers/{id}/reject', [AdminController::class, 'rejectDriver'])->name('admin.drivers.reject');
});


require __DIR__ . '/auth.php';
