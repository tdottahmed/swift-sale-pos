<?php

use App\Http\Controllers\Frontend\Porto\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('frontend.index');
//card
Route::get('/card', [DashboardController::class, 'card'])->name('frontend.card');
//checkout
Route::get('/checkout', [DashboardController::class, 'checkout'])->name('frontend.checkout');
