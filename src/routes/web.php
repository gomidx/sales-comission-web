<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellerController;
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

Route::get('/', [AuthController::class, 'login'])->name('auth.login');

Route::prefix('/login')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/', [AuthController::class, 'loginPost'])->name('auth.login-post');
});

Route::prefix('/register')->group(function () {
    Route::get('/', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/', [AuthController::class, 'registerPost'])->name('auth.register-post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/sales', [SaleController::class, 'index'])->name('dashboard.sales');

        Route::prefix('/sale')->group(function () {
            Route::get('/create', [SaleController::class, 'createSale'])->name('dashboard.create-sale');
            Route::post('/create', [SaleController::class, 'createSalePost'])->name('dashboard.create-sale-post');
        });

        Route::get('/send-sales-email/{email}', [EmailController::class, 'sendEmailToAdministrator'])->name('dashboard.send-administrator-email');

        Route::prefix('/sellers')->group(function () {
            Route::get('/{id}/send-email/{email}', [EmailController::class, 'sendEmailToSeller'])->name('dashboard.send-seller-email');
            Route::get('/', [SellerController::class, 'index'])->name('dashboard.sellers');
        });

        Route::prefix('/seller')->group(function () {
            Route::get('/{id}/sales', [SaleController::class, 'getSellerSales'])->name('dashboard.sales-by-seller');
            Route::get('/create', [SellerController::class, 'createSeller'])->name('dashboard.create-seller');
            Route::post('/create', [SellerController::class, 'createSellerPost'])->name('dashboard.create-seller-post');
            Route::get('/{id}', [SellerController::class, 'updateSeller'])->name('dashboard.edit-seller');
            Route::put('/{id}', [SellerController::class, 'updateSellerPost'])->name('dashboard.edit-seller-post');
            Route::delete('/{id}', [SellerController::class, 'deleteSeller'])->name('dashboard.delete-seller');
        });

    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
