<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();
Route::middleware(['admin','auth'])->name('admin.')->group(function() {

    Route::get('/dashboard', [AppController::class, 'dashboard'])->name('dashboard');

    // Accounts routes
    Route::name('accounts.')->group(function() {
        Route::get('/accounts/my-account', [AccountController::class, 'my_account'])->name('my-account');
        Route::post('/accounts/my-account/profile', [AccountController::class, 'update_profile'])->name('profile.update');
        Route::get('/accounts/my-account/personal', [AccountController::class, 'edit_personal'])->name('personal.edit');
        Route::post('/accounts/my-account/personal', [AccountController::class, 'update_personal'])->name('personal.update');
        Route::get('/accounts/my-account/address', [AccountController::class, 'edit_address'])->name('address.edit');
        Route::post('/accounts/my-account/address', [AccountController::class, 'update_address'])->name('address.update');

        Route::resource('/accounts/users', AccountController::class);
    });

    // Customers routes
    Route::resource('/customers', CustomerController::class);

    // Products categories routes
    Route::resource('/products/categories', ProductCategoryController::class);
    Route::get('/products/categories/{category}/products', [ProductCategoryController::class,'category_products'])->name('category.products');
    
    // Products routes
    Route::resource('/products', ProductController::class);


    // Suppliers routes
    Route::resource('/suppliers', ShopController::class);
    Route::get('/suppliers/{supplier}/products', [ShopController::class,'supplier_products'])->name('supplier.products');

    // Tax routes
    Route::resource('/taxes', TaxController::class);

});

Route::get('/test', [TestController::class, 'test']);

