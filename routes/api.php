<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    // Auth
    Route::post('/register', [UserController::class, 'userRegistration']);
    Route::post('/login', [UserController::class, 'userLogin']);
    Route::post('/send-otp', [UserController::class, 'sendOtp']);
    Route::post('/verify-otp', [UserController::class, 'verifyOtp']);
});

Route::group(['middleware' => TokenVerificationMiddleware::class], function () {

    Route::group(['prefix' => 'auth'], function () {
        // Auth
        Route::post('/logout', [UserController::class, 'userLogout']);
    });

    Route::group(['prefix' => 'user'], function () {
        // User
        Route::get('/profile', [UserController::class, 'getUser']);
        Route::patch('/reset-password', [UserController::class, 'resetPassword']);
    });



    // Customer
    Route::apiResource('/customers', CustomerController::class);

    // Category
    Route::apiResource('/categories', CategoryController::class);

    // Product
    Route::apiResource('/products', ProductController::class);
    Route::post('/products/{product}', [ProductController::class, 'update']);

    // Invoice
    Route::apiResource('/invoices', InvoiceController::class);
});