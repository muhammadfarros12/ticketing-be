<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('/api-products', ProductController::class)->middleware('auth:sanctum');
Route::get('/api-category', [CategoryController::class, 'index'])->middleware('auth:sanctum');
Route::post('/api-order', [OrderController::class, 'store'])->middleware('auth:sanctum');
