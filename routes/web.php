<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
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

Route::get('/', array('as' => 'home', ProductController::class, 'home'))->middleware('auth');

Route::middleware(['auth'])->prefix('products')->group(function () {
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/create', [ProductController::class, 'store']);

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/borrowed', [ProductController::class, 'borrowed']);
    Route::get('/borrowing', [ProductController::class, 'borrowing']);
    Route::post('/{id}/borrow', [ProductController::class, 'borrow']);
    Route::post('/{id}/return', [ReviewController::class, 'addReview']);
    Route::get('/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::get('/{id}', [ProductController::class, 'show']);
});


Route::middleware(['auth'])->prefix('users')->group(
    function () {
        Route::get('/', [UserController::class, 'index']);
        Route::put('/{id}', [UserController::class, 'editProfile']);
        Route::get('/{id}/edit', [UserController::class, 'profile']);
        Route::get('/profile/edit', [UserController::class, 'profile']);
        Route::get('/{id}', [UserController::class, 'show']);
    }
);

Route::post('/logout', array(AuthController::class, 'logout'))->middleware('auth');
