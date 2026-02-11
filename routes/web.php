<?php

use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
=======
Route::get('/', ['App\Http\Controllers\SearchController', 'index'])->name('home');
Route::get('/search', ['App\Http\Controllers\SearchController', 'search'])->name('search');
Route::get('/test', ['App\Http\Controllers\SearchController', 'search'])->name('search');
>>>>>>> 6cf553d715abc6e506d76243e6b95422597789d0

Route::get('/', [SearchController::class, 'index'])->name('home');
Route::post('/search', [SearchController::class, 'searche'])->name('search');