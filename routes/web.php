<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [SearchController::class, 'index'])->name('home');
Route::post('/search', [SearchController::class, 'searche'])->name('search');