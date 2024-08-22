<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login-page', [AuthController::class, 'loginPage'])->name('web.login');
Route::get('/register-page', [AuthController::class, 'registerPage'])->name('web.register');
Route::get('/send-otp-page', [AuthController::class, 'sendOtpPage'])->name('web.send-otp');
Route::get('/verify-otp-page', [AuthController::class, 'verifyOtpPage'])->name('web.verify-otp');
Route::get('/reset-password-page', [AuthController::class, 'resetPasswordPage'])->name('web.reset-password');

Route::get('/dashboard', function () {
    return "Dashboard";
})->name('web.dashboard');