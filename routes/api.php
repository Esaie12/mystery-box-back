<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Api\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// =====================================
// UTILISATEUR
// =====================================
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// =====================================
// CATEGORIES
// =====================================
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

// =====================================
// COMMANDES (UTILISATEUR)
// =====================================
Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store'])->middleware('auth:sanctum');
Route::get('orders-users/my', [OrderController::class, 'myorders_users'])->middleware('auth:sanctum');
Route::get('orders-users/summary', [OrderController::class, 'summary_order_users'])->middleware('auth:sanctum');

// =====================================
// AUTHENTIFICATION - DÉSACTIVÉE
// =====================================
// Les routes d'authentification sont maintenant dans web.php
// Utilisez les routes web à la place :
// - GET  /register       → Formulaire d'enregistrement
// - POST /register       → Soumettre l'enregistrement
// - GET  /login          → Formulaire de connexion
// - POST /login          → Soumettre la connexion
// - POST /logout         → Se déconnecter
// - GET  /forgot-password      → Formulaire mot de passe oublié
// - POST /forgot-password      → Envoyer lien reset
// - GET  /reset-password/{token} → Formulaire reset password
// - POST /reset-password       → Traiter reset password
//
// Les routes API ci-dessous sont COMMENTÉES :
/*
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/user', [AuthController::class, 'user']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::post('auth/resend-verification-email', [AuthController::class, 'resendVerificationEmail']);
Route::get('auth/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('email.verify');
*/

// =====================================
// ADMIN - PRODUITS
// =====================================
Route::prefix('admin')->group(function () {
    Route::get('products', [AdminProductController::class, 'index']);
    Route::get('products/{id}', [AdminProductController::class, 'show']);
    Route::post('products', [AdminProductController::class, 'store']);
    Route::put('products/{id}', [AdminProductController::class, 'update']);
    Route::delete('products/{id}', [AdminProductController::class, 'destroy']);

    // =====================================
    // ADMIN - UTILISATEURS
    // =====================================
    Route::get('users', [AdminUserController::class, 'index']);
    Route::get('users/{id}', [AdminUserController::class, 'show']);
    Route::post('users', [AdminUserController::class, 'store']);
    Route::put('users/{id}', [AdminUserController::class, 'update']);
    Route::delete('users/{id}', [AdminUserController::class, 'destroy']);

    // =====================================
    // ADMIN - COMMANDES
    // =====================================
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::get('orders/{id}', [AdminOrderController::class, 'show']);
    Route::patch('orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
    Route::get('orders-stats', [AdminOrderController::class, 'stats']);
});
