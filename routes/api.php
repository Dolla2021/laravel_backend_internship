<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/categories', [ProductController::class, 'getByCategory']);

Route::group(['prefix' => 'auth'], function () {
  Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('register', [AuthController::class, 'register']);
    // Endpoint to log in a user. Returns a token upon successful authentication.
    Route::post('login', [AuthController::class, 'login']);
     Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);
});
 Route::post('user', [AuthController::class, 'user']);
 