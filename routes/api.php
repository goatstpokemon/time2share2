<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




//  Public Routes

Route::post('/register', array(AuthController::class, 'register'));
Route::post('/login', array(AuthController::class, 'login'));
Route::middleware('auth:sanctum')->post('/logout', function () {
    Auth::user()->tokens()->where('id', Auth::user()->currentAccessToken()->id)->delete();

    return response()->json(['message' => 'Logged out successfully']);
});


// Protected Routes
Route::post('/products/create', array(ProductController::class, 'store'))->middleware('auth');
Route::put('/products/{id}/edit', array(ProductController::class, 'show'))->middleware('auth');
