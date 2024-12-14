<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
  Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/register', [UserController::class, 'createUser']);