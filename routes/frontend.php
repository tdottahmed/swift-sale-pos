<?php

use App\Http\Controllers\Frontend\Porto\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/frontend/index', [DashboardController::class, 'index'])->name('frontend.index');
