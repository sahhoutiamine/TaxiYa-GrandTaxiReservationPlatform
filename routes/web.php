<?php

use Illuminate\Support\Facades\Route;

Route::get('/', ['App\Http\Controllers\SearchController', 'index'])->name('home');
