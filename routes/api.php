<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\SellerController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [UserController::class, 'createUser']);
});

Route::prefix('users')->middleware('jwt')->group(function () {
    Route::get('/', [UserController::class, 'getUsers']);
    Route::prefix('seller')->group(function () {
        Route::post('/', [SellerController::class, 'createSeller']);
    });
});
