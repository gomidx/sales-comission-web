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
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('auth.login-post');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('auth.register-post');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home');

    Route::get('/dashboard/sales', [SaleController::class, 'index'])->name('dashboard.sales');
    Route::get('/dashboard/sale/create', [SaleController::class, 'createSale'])->name('dashboard.create-sale');
    Route::post('/dashboard/sale/create', [SaleController::class, 'createSalePost'])->name('dashboard.create-sale-post');

    Route::get('/dashboard/seller/{id}/send-email', [EmailController::class, 'sendSellerEmail'])->name('dashboard.send-seller-email');
    Route::get('/dashboard/send-sales-email', [EmailController::class, 'sendAdmnistratorEmail'])->name('dashboard.send-administrator-email');

    Route::get('/dashboard/sellers', [SellerController::class, 'index'])->name('dashboard.sellers');
    Route::get('/dashboard/seller/{id}/sales', [SaleController::class, 'getSellerSales'])->name('dashboard.sales-by-seller');
    Route::get('/dashboard/seller/create', [SellerController::class, 'createSeller'])->name('dashboard.create-seller');
    Route::post('/dashboard/seller/create', [SellerController::class, 'createSellerPost'])->name('dashboard.create-seller-post');
    Route::get('/dashboard/seller/{id}', [SellerController::class, 'updateSeller'])->name('dashboard.edit-seller');
    Route::put('/dashboard/seller/{id}', [SellerController::class, 'updateSellerPost'])->name('dashboard.edit-seller-post');
    Route::delete('/dashboard/seller/{id}', [SellerController::class, 'deleteSeller'])->name('dashboard.delete-seller');
});
