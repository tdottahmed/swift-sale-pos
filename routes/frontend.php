<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Porto\FrontendController;
use App\Http\Controllers\Frontend\Porto\BlogController;
use App\Http\Controllers\Frontend\Porto\CommentController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/category-wise-product/{category}', [FrontendController::class, 'categoryWiseProduct'])->name('frontend.category-wise-product');
Route::get('/single-product/{product}', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//cart
Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
//checkout
Route::get('/checkouts', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact-us', [FrontendController::class, 'storeContact'])->name('frontend.contact-us.store');


//block
Route::resource('/blogs', BlogController::class);

// Route::middleware('auth')->group(function () {
Route::resource('comments', CommentController::class);
// });
// Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::post('/review/store', [FrontendController::class, 'reviewStore'])->name('review.post');
