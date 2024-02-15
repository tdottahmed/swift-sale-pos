<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('swift-sale')->name('organization.')->controller(OrganizationController::class)->group(function(){
    Route:: get('/index','index')->name('index');
    Route:: get('/create','create')->name('create');
    Route:: post('/store','store')->name('store');
        });
    Route::resource('categories', CategoryController::class);
});

require __DIR__.'/auth.php';

Route::prefix('swift-sale')->name('organization.')->controller(OrganizationController::class)->group(function(){
Route:: get('/index','index')->name('index');
Route:: get('/create','create')->name('create');
Route:: post('/store','store')->name('store');
Route:: get('/edit/{organization}','edit')->name('edit');
Route:: post('/update/{organization}','update')->name('update');

 });
