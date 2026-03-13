<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/occasions', function () { return view('occasions'); })->name('occasions');
Route::get('/occasion/{slug}', function ($slug) { return view('category_by_occasion'); })->name('category_by_occasion');
Route::get('/contact', function () { return view('contact'); })->name('contact');

//Gérer la redirection apres la connexion des users
Route::get('home',function(){  
    return redirect()->route('welcome');
})->name('home')->middleware('auth','redirect_access');


//Routes pour les users connectés
Route::middleware(['auth', 'customer_access'])->group(function () {
    
    Route::get('account',function(){
        return view('users.account');
    })->name('my_account')->middleware('auth');

});

//Routes pour les admin
require __DIR__.'/admin.php';
