<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//  Public Routes
Route::post('/login', array(AuthController::class, 'login'));
Route::post('/register', array(AuthController::class, 'register'));


// Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/products', ProductController::class);
    Route::post('/logout', array(AuthController::class, 'logout'));
});
