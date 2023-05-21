<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\CheckoutController as CheckoutUpdateStatus;
use App\Http\Controllers\Admin\DiscountController as DiscountCheckout;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

// midtrans routes
Route::get('payment/success', [UserController::class, 'midtransCallback']);
Route::post('payment/success', [UserController::class, 'midtransCallback']);


// socialite
Route::get('/signin-google', [UserController::class, 'google'])->name('user.google.login');
Route::get('/auth/google/callback', [UserController::class, 'googleHandlerCallback']);

// Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // checkout
    Route::post('/checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('userRole:user');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('userRole:user');
    Route::get('/checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('userRole:user');

    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');


    // user
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('userRole:user')->group(function(){
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });


    // admin
    Route::prefix('admin/dashboard')->name('admin.')->middleware('userRole:admin')->group(function(){
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

        // paid status update
        Route::post('/checkout/{checkout}', [CheckoutUpdateStatus::class, 'update'])->name('checkout.update');

        // discount controller
        Route::get('/discount', [DiscountCheckout::class, 'index'])->name('discount.index');
        Route::get('/discount/create', [DiscountCheckout::class, 'create'])->name('discount.create');
        Route::get('/discount/store', [DiscountCheckout::class, 'store'])->name('discount.store');
        Route::get('/discount/edit/{discount}', [DiscountCheckout::class, 'edit'])->name('discount.edit');
        Route::delete('/discount/{discount}', [DiscountCheckout::class, 'destroy'])->name('discount.destroy');
        Route::post('/discount/{discount}', [DiscountCheckout::class, 'update'])->name('discount.update');
        // Route::resource('discount', [DiscountCheckout::class]);



    });

});

require __DIR__.'/auth.php';
