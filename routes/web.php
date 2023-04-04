<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Public routes
Route::post('/register', array(AuthController::class, 'register'));
Route::post('/login', array(AuthController::class, 'login'));
Route::get('/login', array('as' => 'login',  function () {
    return view('pages.login');
}));


Route::resource('/products', ProductController::class)->middleware('auth');
Route::post('/logout', array(AuthController::class, 'logout'))->middleware('auth');

Route::get('/', [ProductController::class, 'index']);
