<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;

// -------------------- UTILISATEUR --------------------
// Route pour récupérer l'utilisateur connecté (auth seulement)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// -------------------- CATEGORIES --------------------
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

// -------------------- COMMANDES --------------------
Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store'])->middleware('auth:sanctum');
Route::get('orders-users/my', [OrderController::class, 'myorders_users'])->middleware('auth:sanctum');
Route::get('orders-users/summary', [OrderController::class, 'summary_order_users'])->middleware('auth:sanctum');

// -------------------- AUTH --------------------
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/user', [AuthController::class, 'user']); // info utilisateur
Route::post('auth/logout', [AuthController::class, 'logout']);

// -------------------- ADMIN --------------------
Route::prefix('admin')->group(function () {

    // PRODUITS ADMIN (publiques, pas d'auth)
    Route::get('products', [AdminProductController::class, 'index']);
    Route::get('products/{id}', [AdminProductController::class, 'show']);
    Route::post('products', [AdminProductController::class, 'store']);
    Route::put('products/{id}', [AdminProductController::class, 'update']);
    Route::delete('products/{id}', [AdminProductController::class, 'destroy']);

    // UTILISATEURS ADMIN (pas d'auth)
    Route::get('users', [AdminUserController::class, 'index']);
    Route::get('users/{id}', [AdminUserController::class, 'show']);
    Route::post('users', [AdminUserController::class, 'store']);
    Route::put('users/{id}', [AdminUserController::class, 'update']);
    Route::delete('users/{id}', [AdminUserController::class, 'destroy']);

    // COMMANDES ADMIN (pas d'auth)
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::get('orders/{id}', [AdminOrderController::class, 'show']);
    Route::patch('orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
    Route::get('orders-stats', [AdminOrderController::class, 'stats']);
});
