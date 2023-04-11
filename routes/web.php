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
Route::get('/register', array('as' => 'register',  function () {
    return view('pages.register');
}));

Route::get('/', array(ProductController::class, 'home'))->middleware('auth');


Route::get('/products/create', array(ProductController::class, 'create'))->middleware('auth');
Route::post('/products/create', array(ProductController::class, 'store'))->middleware('auth');
Route::put('/products/{id}/edit', array(ProductController::class, 'show'))->middleware('auth');
Route::get('/products/{id}/edit', array(ProductController::class, 'show'))->middleware('auth');
Route::get('/products/{id}/', array(ProductController::class, 'show'))->middleware('auth');
Route::get('/products', array(ProductController::class, 'index'))->middleware('auth');
Route::get('/products/borrowed', array(ProductController::class, 'borrowed'))->middleware('auth');
Route::get('/products/borrowing', array(ProductController::class, 'borrowing'))->middleware('auth');
Route::post('/logout', array(AuthController::class, 'logout'))->middleware('auth');
