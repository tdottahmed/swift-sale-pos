<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BarcodeTypeController;
use App\Http\Controllers\ContactTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ExpenseCategoryController;


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


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // organization setting
    Route::prefix('swift-sale')->name('organization.')->controller(OrganizationController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
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
    Route::resource('branch', BranchController::class);

    //Purchase
    Route::resource('/purchase', PurchaseController::class);


    //HRM
    Route::resource('/department', DepartmentController::class);
    Route::resource('/employee', EmployeeController::class);
    Route::resource('/payroll', PayrollController::class);
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
    Route::get('/images/add/{product}', [ProductController::class, 'addImage'])->name('product.addImage');
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
    Route::get('pos-create', [SaleController::class, 'create'])->name('pos.create');
    Route::post('pos-store', [SaleController::class, 'store'])->name('pos.store');
    Route::get('single/product/{productId}/{variationId}', [SaleController::class, 'singleProduct']);
    Route::get('pos-list', [SaleController::class, 'index'])->name('pos.index');
    Route::get('pos/invoice/{id}', [SaleController::class, 'invoice'])->name('pos.invoice');
    Route::get('suspend-sale/{sale}', [SaleController::class, 'suspendSale'])->name('sale.suspend');
    Route::get('pos/suspended-list', [SaleController::class, 'suspendedList'])->name('suspended.list');
    Route::get('pos/return/{sale}', [SaleController::class, 'returnSale'])->name('return.sale');
    Route::get('pos/returned-list', [SaleController::class, 'returnedList'])->name('returned.list');
    Route::get('/filter-products', [SaleController::class, 'filterProducts'])->name('filter.product');
    Route::get('pos/recent-sales', [SaleController::class, 'recentSales'])->name('recent.sales');


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

    Route::get('/search-products', [ProductController::class, 'search'])->name('product.search');

    // Report

    Route::get('/reports/profit-loss', [ReportController::class, 'profitLoss'])->name('reports.profitLoss');
    Route::get('/reports/purchase-sale', [ReportController::class, 'purchaseSale'])->name('reports.purchaseSale');
    Route::get('/reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');
    Route::get('/reports/expense', [ReportController::class, 'expense'])->name('reports.expense');
    Route::get('/reports/trending-products', [ReportController::class, 'trendingProducts'])->name('reports.trending-products');
    Route::get('/reports/daily-sales', [ReportController::class, 'dailySales'])->name('reports.daily-sales');

    // Profit Report by Tab Content
    Route::get('reports/profit-by-product', [ReportController::class, 'profitByProduct'])->name('reports.profit-by-product');
    Route::get('reports/profit-by-category', [ReportController::class, 'profitByCategory'])->name('reports.profit-by-category');
    Route::get('reports/profit-by-brand', [ReportController::class, 'profitByBrand'])->name('reports.profit-by-brand');
    Route::get('reports/profit-by-day', [ReportController::class, 'profitByDay'])->name('reports.profit-by-day');
    Route::get('reports/profit-by-customer', [ReportController::class, 'profitByCustomer'])->name('reports.profit-by-customer');
});


Route::group(['middleware' => ['role:super-admin|admin|staff|user']], function () {

    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
});
require __DIR__ . '/auth.php';
