<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarcodeTypeController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ShippingController;

use App\Http\Controllers\SliderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\VariableController;


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


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // organization setting
    Route::prefix('swift-sale')->name('organization.')->controller(OrganizationController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{organization}', 'edit')->name('edit');
        Route::post('/update/{organization}', 'update')->name('update');
    });
    Route::post('update/theme', [OrganizationController::class, 'updateTheme'])->name('theme.update');
    Route::get('swift-sale/setup/smtp', [OrganizationController::class, 'createSmtp'])->name('smtp.create');
    Route::post('swift-sale/setup/smtp', [OrganizationController::class, 'storeSmtp'])->name('smtp.store');
    Route::get('swift-sale/setup/sms', [OrganizationController::class, 'createSmsGateway'])->name('sms.create');
    Route::post('swift-sale/setup/sms', [OrganizationController::class, 'storeSmsGateway'])->name('sms.store');


    // master table
    Route::resource('/brand', BrandController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/size', SizeController::class);
    Route::resource('/color', ColorController::class);
    Route::resource('/barcodeType', BarcodeTypeController::class);
    Route::resource('/subCategory', SubCategoryController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('variables', VariableController::class);
    Route::resource('tax', TaxController::class);


    //HRM
    Route::resource('/department', DepartmentController::class);
    Route::resource('/employee', EmployeeController::class);
    Route::resource('/payroll', PayrollController::class);

    Route::resource('/attendance', AttendanceController::class);
    Route::post('/attendance/mark', [AttendanceController::class, 'markAttendance']);
    Route::post('/attendance/close', [AttendanceController::class, 'closeAttendance']);
    Route::get('/showAttendance', [AttendanceController::class, 'showAttendance'])->name('showAttendance');
    


    Route::resource('/holiday', HolidayController::class);
    Route::resource('/leaveType', LeaveTypeController::class);
    Route::resource('/leave', LeaveController::class);
    Route::get('/leave-application/{leave}', [LeaveController::class, 'leavePdf'])->name('leave.pdf');
    Route::put('/status/{leave}', [LeaveController::class, 'updatestatus'])->name('leave.update.status');


    // product table
    Route::resource('/product', ProductController::class);
    Route::get('/excel/import', [ProductController::class, 'import'])->name('product.import');
    Route::post('/excel/store', [ProductController::class, 'excelStore'])->name('excel.store');
    Route::get('/print-label/{id}', [ProductController::class, 'labelPrint'])->name('label.print');
    Route::post('/check-sku', [ProductController::class, 'checkSKU'])->name('check.sku');
    Route::post('/images/store/{product}', [ProductController::class, 'imageStore'])->name('product.image.store');


    //Shipping
    Route::get('/shipping/index', [ShippingController::class, 'index'])->name('shipping.index');
    Route::get('/shipping/create', [ShippingController::class, 'create'])->name('shipping.create');
    Route::post('/shipping', [ShippingController::class, 'store'])->name('shipping.store');
    Route::get('/shipping/{id}/edit', [ShippingController::class, 'edit'])->name('shipping.edit');
    Route::put('/shipping/{id}', [ShippingController::class, 'update'])->name('shipping.update');
    Route::delete('/shipping/{id}', [ShippingController::class, 'delete'])->name('shipping.delete');

   //Coupon code routes
   Route::get('/coupon/index', [DiscountCodeController::class, 'index'])->name('coupon.index');
    Route::get('/coupon/create', [DiscountCodeController::class, 'create'])->name('coupon.create');
    Route::post('/coupon', [DiscountCodeController::class, 'store'])->name('coupon.store');
    Route::get('/coupon/{coupon}/edit', [DiscountCodeController::class, 'edit'])->name('coupon.edit');
    Route::put('/coupon/{coupon}', [DiscountCodeController::class, 'update'])->name('coupon.update');

    // Route::put('/coupon/{coupon}', [DiscountCodeController::class, 'update'])->name('coupon.update');
    Route::delete('/coupon/{coupon}', [DiscountCodeController::class, 'destroy'])->name('coupon.destroy');

     


    // Point of sell
    // Route::resource('pos', SellController::class);
    Route::get('pos-create', [SaleController::class,'create'])->name('pos.create');
    Route::post('pos-store', [SaleController::class,'store'])->name('pos.store');
    Route::get('single/product/{productId}/{variationId}', [SaleController::class, 'singleProduct']);
    Route::get('pos-list',[SaleController::class,'index'])->name('pos.index');
    Route::get('pos/invoice/{id}', [SaleController::class, 'invoice'])->name('pos.invoice');
    Route::get('suspend-sale/{sale}',[SaleController::class, 'suspendSale'])->name('sale.suspend');
    Route::get('pos/suspended-list',[SaleController::class,'suspendedList'])->name('suspended.list');
    Route::get('pos/return/{sale}',[SaleController::class,'returnSale'])->name('return.sale');
    Route::get('pos/returned-list',[SaleController::class,'returnedList'])->name('returned.list');
    Route::get('/filter-products',[SaleController::class,'filterProducts'])->name('filter.product');

 
    Route::resource('customer', CustomerController::class);
    Route::resource('supplier', SupplierController::class);
    Route::get('product-filter/{sku}', [ProductController::class, 'filterProduct'])->name('filterProduct');

    //Expenses
    Route::resource('expense-category', ExpenseCategoryController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('payment-method', PaymentMethodController::class);

    //Contacts
    // Route::resource('contact-type', ContactTypeController::class);
    Route::resource('contacts', ContactController::class);
    Route::get('/compose-mail/{contact}', [ContactController::class, 'composeEmail'])->name('contact.composeEmail');
    Route::post('/send-mail', [ContactController::class, 'sendEmail'])->name('contact.sendEmail');
    Route::get('/compose-sms/{contact}', [ContactController::class, 'composeSms'])->name('contact.composeSms');
    Route::post('/send-sms', [ContactController::class, 'sendSms'])->name('contact.sendSms');

    //Repair
    Route::resource('repair', RepairController::class);

    //Campaign
    Route::resource('campaign', CampaignController::class);
    // Route::get('campaign/createDirect', [CampaignController::class, 'createDirect'])->name('campaign.createDirect');
    Route::get('send-campaign-email/{campaign}', [CampaignController::class, 'sendEmail'])->name('campaign.sendEmail');
    Route::get('send-campaign-sms/{campaign}', [CampaignController::class, 'sendSms'])->name('campaign.sendSms');

    // Order Routes 
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'detail'])->name('orders.detail');
    // Route::post('/order/change-status/{id}', [OrderController::class, 'chnageOrderStatus'])->name('orders.chnageOrderStatus');
    Route::post('/order/change-status/{id}', [OrderController::class, 'changeOrderStatus'])->name('orders.changeOrderStatus');
    Route::post('/order/send-email/{id}', [OrderController::class, 'sendInvoiceEmail'])->name('orders.sendInvoiceEmail');



});

require __DIR__ . '/auth.php';


Route::group(['middleware' => ['role:super-admin|admin|staff|user']], function () {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

});
