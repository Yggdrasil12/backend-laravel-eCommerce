<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Autenticación del usuario
Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::resource('products', ProductController::class);

Route::resource('users', UserController::class);
