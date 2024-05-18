<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Porto\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/category-wise-product/{category}', [FrontendController::class, 'categoryWiseProduct'])->name('frontend.category-wise-product');
Route::get('/single-product/{product}', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//cart
Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
//checkout
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
