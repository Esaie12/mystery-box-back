<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\OccasionController;


Route::prefix('admin')->middleware(['auth', 'admin_access'])->group(function () {
    
    Route::get('dashboard',function(){
        return view('admins.dashboard');
    })->name('admin_dashboard');


    Route::get('/countries', [CountryController::class, 'index'])->name('admin_countries');
    Route::put('/countries/{id}', [CountryController::class, 'update'])->name('admin_country_update');
    Route::get('/countries/{id}/toggle', [CountryController::class, 'toggleStatus'])->name('admin_country_toggle_status');

    //Occasions
    Route::prefix('occassions')->group(function () {
        Route::get('/', [OccasionController::class, 'index'])->name('admin_occasions');
        Route::post('/',[OccasionController::class,'store'])->name('admin_occasions_store');
        Route::put('/{id}',[OccasionController::class,'update'])->name('admin_occasions_update');
        Route::delete('/{id}',[OccasionController::class,'destroy'])->name('admin_occasions_delete');
    });
});

