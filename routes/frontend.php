<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Porto\FrontendController;
use App\Http\Controllers\Frontend\Porto\BlogController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/single-product', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//card
Route::get('/cart', [FrontendController::class, 'cart'])->name('frontend.cart');
//checkout
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');


//block
Route::resource('/blog', BlogController::class);
