<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\EmailVerificationController;
use App\Http\Controllers\API\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Auth routes
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('user', 'user');
});

// Email
Route::middleware('auth:api')->group(function(){
    Route::post('/email-verification', [EmailVerificationController::class, 'email_verification']);
    Route::get('/email-verification', [EmailVerificationController::class, 'resend_email_verification']);
});
