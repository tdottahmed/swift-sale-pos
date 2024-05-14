<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Porto\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/single-product', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
