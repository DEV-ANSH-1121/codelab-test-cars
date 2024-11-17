<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BrandController;
use App\Http\Controllers\Web\ModelController;

Route::get('/', [BrandController::class, 'listing'])->name('home');

// Brand Routes
Route::resource('brands', BrandController::class);

// Model Routes
Route::resource('models', ModelController::class);
