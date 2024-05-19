<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Porto\FrontendController;
use App\Http\Controllers\Frontend\Porto\BlogController;
use App\Http\Controllers\Frontend\Porto\CommentController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
<<<<<<< HEAD
Route::get('/single-product', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//card
Route::get('/carts', [FrontendController::class, 'cart'])->name('frontend.cart');
=======
Route::get('/category-wise-product/{category}', [FrontendController::class, 'categoryWiseProduct'])->name('frontend.category-wise-product');
Route::get('/single-product/{product}', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//cart
Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
>>>>>>> 71973c2
//checkout
Route::get('/checkouts', [FrontendController::class, 'checkout'])->name('frontend.checkout');


//block
Route::resource('/blogs', BlogController::class);

// Route::middleware('auth')->group(function () {
    Route::resource('comments', CommentController::class);
// });