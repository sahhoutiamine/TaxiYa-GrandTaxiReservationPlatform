<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['App\Http\Controllers\SearchController', 'index'])->name('home');
Route::get('/search', ['App\Http\Controllers\SearchController', 'search'])->name('search');
Route::get('/test', ['App\Http\Controllers\SearchController', 'search'])->name('search');

