<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SellerRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\SellerController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>"auth"], function(){
    // Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Seller
    Route::get('/MyStore', [SellerController::class, 'index'])->name('seller.mystore');

    // Customer
    Route::get('/sellerRequests', [SellerRequestController::class, 'index'])->name('sellerRequests.index');
    Route::post('/become-seller', [SellerRequestController::class, 'store'])->name('become-seller');
    Route::put('/sellerRequests/{id}', [SellerRequestController::class, 'update'])->name('sellerRequests.update');
});

require __DIR__ . '/auth.php';
