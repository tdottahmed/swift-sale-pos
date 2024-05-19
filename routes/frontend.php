<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Porto\FrontendController;
use App\Http\Controllers\Frontend\Porto\BlogController;
use App\Http\Controllers\Frontend\Porto\CommentController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/single-product', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//card
Route::get('/carts', [FrontendController::class, 'cart'])->name('frontend.cart');
//checkout
Route::get('/checkouts', [FrontendController::class, 'checkout'])->name('frontend.checkout');


//block
Route::resource('/blogs', BlogController::class);

// Route::middleware('auth')->group(function () {
    Route::resource('comments', CommentController::class);
// });