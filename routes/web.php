<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarcodeTypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;
use App\Models\ExpenseCategory;

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

    // organization setting
    Route::prefix('swift-sale')->name('organization.')->controller(OrganizationController::class)->group(function(){
    Route:: get('/index','index')->name('index');
    Route:: get('/create','create')->name('create');
    Route:: post('/store','store')->name('store');
    Route:: get('/edit/{organization}','edit')->name('edit');
    Route:: post('/update/{organization}','update')->name('update');
        });

    // master table
    Route::resource('/brand', BrandController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/size', SizeController::class);
    Route::resource('/color', ColorController::class);
    Route::resource('/barcodeType', BarcodeTypeController::class);
    Route::resource('/subCategory', SubCategoryController::class);

    // product table
    Route::resource('/product', ProductController::class);
    Route::get('/excel/import', [ProductController::class, 'import'])->name('excel.import');
    Route::post('/excel/store', [ProductController::class, 'excelStore'])->name('excel.store');
    Route::get('/print-label/{id}', [ProductController::class, 'labelPrint'])->name('label.print');

    // Point of sell
    Route::resource('pos', SellController::class);

    Route::resource('customer', CustomerController::class);
    Route::get('product-filter/{sku}', [ProductController::class,'filterProduct'])->name('filterProduct');

    //Expenses
    Route::resource('expense-category', ExpenseCategoryController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('payment-method', PaymentMethodController::class);

    //Contacts
    Route::resource('contacts', ContactController::class);

});

require __DIR__.'/auth.php';

