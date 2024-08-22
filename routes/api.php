<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user-registration', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);

Route::post('/send-otp', [UserController::class, 'sendOtp']);
Route::post('/verify-otp', [UserController::class, 'verifyOtp']);

Route::group(['middleware' => TokenVerificationMiddleware::class], function () {
    Route::post('/user-logout', [UserController::class, 'userLogout']);
    Route::get('/user', [UserController::class, 'getUser']);
    Route::patch('/reset-password', [UserController::class, 'resetPassword']);


    // Customer
    Route::apiResource('/customers', CustomerController::class);

    // Category
    Route::apiResource('/categories', CategoryController::class);

    // Product
    Route::apiResource('/products', ProductController::class);
});