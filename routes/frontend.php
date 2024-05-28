<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\Porto\BlogController;
use App\Http\Controllers\Frontend\Porto\CommentController;
use App\Http\Controllers\Frontend\Porto\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/category-wise-product/{category}', [FrontendController::class, 'categoryWiseProduct'])->name('frontend.category-wise-product');
Route::get('/single-product/{product}', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//cart
// Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
// Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
//checkout
// Route::get('/checkouts', [FrontendController::class, 'checkout'])->name('frontend.checkout');


//block
Route::resource('/blogs', BlogController::class);

// Route::middleware('auth')->group(function () {
    Route::resource('comments', CommentController::class);
// });


Route::get('/cart', [CartController::class, 'cart'])->name('frontend.cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('frontend.addToCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('frontend.updateCart');
Route::post('/delete-item', [CartController::class, 'deleteItem'])->name('frontend.deleteItem.cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('frontend.checkout');
Route::post('/process-checkout', [CartController::class, 'processCheckout'])->name('frontend.processCheckout');
Route::get('/thanks/{orderId}', [CartController::class, 'thankyou'])->name('frontend.thankyou');
Route::post('/get-order-summary', [CartController::class, 'getOrderSummary'])->name('frontend.getOrderSummary');
