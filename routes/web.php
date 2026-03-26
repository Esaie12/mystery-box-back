<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;

// Pages publiques
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/occasions', function () {
    return view('occasions');
})->name('occasions');

Route::get('/occasion/{slug}', function ($slug) {
    return view('category_by_occasion', compact('slug'));
})->name('category_by_occasion');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// ============================================
// ROUTES POUR LES UTILISATEURS NON AUTHENTIFIÉS (guest)
// ============================================
Route::middleware('guest')->group(function () {
    // Verify Email Page
    Route::get('/verify-email', function () {
        return view('auth.verify_email');
    })->name('verify_email');
     // Verify Email via Link
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('email.verify');
    // Register
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Login
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Forgot Password
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// ============================================
// ROUTES POUR LES UTILISATEURS AUTHENTIFIÉS
// ============================================

// Redirection après connexion
Route::get('/home', function () {
    return redirect()->route('welcome');
})->name('home')->middleware('auth','redirect_access');

// Routes pour les utilisateurs connectés (clients)
Route::middleware(['auth', 'customer_access'])->group(function () {
    Route::get('/account', function () {
        return view('users.account');
    })->name('my_account');

    Route::get('/account/edit', function () {
        return view('users.edit_account');
    })->name('edit_account');
    // Checkout - protégé par auth
    Route::get('/checkout', function () {
        return view('users.checkout');
    })->name('checkout');

    // Créer la commande
    Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes pour les admins
require __DIR__.'/admin.php';

// Route pour debugger l'authentification
Route::get('/debug-auth', function () {
    return [
        'user' => Auth::user(),
        'session' => session()->all(),
    ];
});
