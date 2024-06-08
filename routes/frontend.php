<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\Porto\BlogController;
use App\Http\Controllers\Frontend\Porto\CommentController;
use App\Http\Controllers\Frontend\Porto\FrontendController;
use App\Http\Controllers\OrderController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/category-wise-product/{category}', [FrontendController::class, 'categoryWiseProduct'])->name('frontend.category-wise-product');
Route::get('/single-product/{product}', [FrontendController::class, 'singleProduct'])->name('frontend.single-product');
//cart
// Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
// Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
//checkout
Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
//checkout
Route::get('/checkouts', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact-us', [FrontendController::class, 'storeContact'])->name('frontend.contact-us.store');
// Route::get('/cart/{user}', [FrontendController::class, 'cart'])->name('frontend.cart');
// Route::post('/add-to-cart', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
//checkout
// Route::get('/checkouts', [FrontendController::class, 'checkout'])->name('frontend.checkout');


//block
Route::resource('/blogs', BlogController::class);

// Route::middleware('auth')->group(function () {
Route::resource('comments', CommentController::class);
// });
// Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::post('/review/store', [FrontendController::class, 'reviewStore'])->name('review.post');
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
Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('frontend.applyDiscount');
Route::post('/remove-discount', [CartController::class, 'removeCoupon'])->name('frontend.removeCoupon');

Route::post('/add-to-wishlist', [FrontendController::class, 'addToWishlist'])->name('frontend.addToWishlist');

Route::get('/my-wishlist', [FrontendController::class, 'wishlist'])->name('frontend.wishlist');
Route::post('/remove-product-from-wishlist', [FrontendController::class, 'removeProductFormWishlist'])->name('frontend.removeProductFormWishlist');
