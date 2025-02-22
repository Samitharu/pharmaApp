<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/procurement/requests', function () {
        return view('procurement.requests');
    })->name('procurement.requests');
    
    Route::get('/procurement/orders', function () {
        return view('procurement.orders');
    })->name('procurement.orders');
    
    Route::get('/procurement/suppliers', function () {
        return view('procurement.suppliers');
    })->name('procurement.suppliers');

    Route::get('/masterdata/items', function () {
        return view('masterdata.item');
    })->name('masterdata.item');
});

require __DIR__.'/auth.php';
