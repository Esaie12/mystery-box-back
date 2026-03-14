<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


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

// Redirection après connexion
Route::get('/home', function () {
    return redirect()->route('welcome'); // Tu peux personnaliser selon le rôle
})->name('home')->middleware('auth','redirect_access');

// Routes pour les utilisateurs connectés (clients)
Route::middleware(['auth', 'customer_access'])->group(function () {
    Route::get('/account', function () {
        return view('users.account'); // Assure-toi que ce fichier existe
    })->name('my_account');
});

    Route::get('/account/edit', function () {
        return view('users.edit_account'); // Assure-toi que ce fichier existe
    })->name('edit_account');

// Routes pour les admins
require __DIR__.'/admin.php';

// Pages d’authentification
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/verify-email', function () {
    return view('auth.verify_email');
})->name('verify_email');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
//Route pour debugger l'authentification
Route::get('/debug-auth', function () {
    return [
        'user' => Auth::user(),
        'session' => session()->all(),
    ];
});
//Route pour forget password
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
