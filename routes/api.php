<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Les categories
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);   // ou PATCH
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

//Les commandes
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::get('orders', [OrderController::class, 'index']);
#Route::get('orders/{id}', [OrderController::class, 'show']);

Route::post('/orders', [OrderController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/orders-users/my', [OrderController::class, 'myorders_users'])->middleware('auth:sanctum');;
    Route::get('/orders-users/summary', [OrderController::class, 'summary_order_users'])->middleware('auth:sanctum');;



//Connexion
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('user', [AuthController::class, 'user']);//middleware('auth:sanctum')->
Route::post('auth/logout', [AuthController::class, 'logout']);

//Admin - Users
oute::prefix('admin')->middleware('auth:sanctum')->group(function () {

    // Commandes
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::get('orders/{id}', [AdminOrderController::class, 'show']);
    Route::patch('orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
    Route::get('orders-stats', [AdminOrderController::class, 'stats']);

    // Utilisateurs
    Route::get('users', [AdminUserController::class, 'index']);
    Route::get('users/{id}', [AdminUserController::class, 'show']);
    Route::post('users', [AdminUserController::class, 'store']);
    Route::put('users/{id}', [AdminUserController::class, 'update']);
    Route::delete('users/{id}', [AdminUserController::class, 'destroy']);

    // Produits
    Route::get('products', [AdminProductController::class, 'index']);
    Route::get('products/{id}', [AdminProductController::class, 'show']);
    Route::post('products', [AdminProductController::class, 'store']);
    Route::put('products/{id}', [AdminProductController::class, 'update']);
    Route::delete('products/{id}', [AdminProductController::class, 'destroy']);
});
