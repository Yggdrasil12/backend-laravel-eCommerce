<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/get/products', [productsController::class,'index']);
Route::resource('products', ProductController::class);

Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);

// Route::get('/product/{id}', [ProductController::class,'edit']);
