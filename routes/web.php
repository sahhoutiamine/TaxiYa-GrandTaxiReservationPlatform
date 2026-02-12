<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;




Route::get('/', [SearchController::class, 'index'])->name('home');

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::get('/dashboard', function () {
    return view('driver.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/createRide', [RideController::class, 'search'])->name('dashboard.create');
Route::get('/dashboard/storeseRide', [RideController::class, 'index'])->name('rides.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';