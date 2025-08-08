<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\CartController;
Route::middleware('auth:api')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'getWishlist']);
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist']);
    Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist']);
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::post('/cart/remove', [CartController::class, 'removeFromCart']);
    Route::post('/cart/update-quantity', [CartController::class, 'updateCartQuantity']);
});

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/products/categories', [ProductController::class, 'getByCategory']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
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
