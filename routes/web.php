<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

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

Route::get('/api', function () {
    return redirect("/api/documentation");
});

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::group(['middleware'=>"auth"], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
