<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/masuk', [AuthController::class, 'login'])->middleware('throttle:6,1');

    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [AuthController::class, 'register'])->middleware('throttle:6,1');
});

Route::middleware('auth')->group(function () {
    Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

if (app()->isLocal()) {
    Route::view('/styleguide', 'styleguide');
}
