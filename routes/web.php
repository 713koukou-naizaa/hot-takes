<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SauceController;

Route::get('/', function () { return response()->json(['message' => 'Welcome to the Sauce API']); });

/* Route::get('/', function () {
    return view('welcome');
}); */

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for managing sauces
/* Route::get('/sauces', [SauceController::class, 'index'])->name('sauces.index');
Route::get('/sauces/create', [SauceController::class, 'create'])->name('sauces.create');
Route::post('/sauces', [SauceController::class, 'store'])->name('sauces.store');
Route::get('/sauces/{sauce}', [SauceController::class, 'show'])->name('sauces.show');
Route::get('/sauces/{sauce}/edit', [SauceController::class, 'edit'])->name('sauces.edit');
Route::put('/sauces/{sauce}', [SauceController::class, 'update'])->name('sauces.update');
Route::delete('/sauces/{sauce}', [SauceController::class, 'destroy'])->name('sauces.destroy'); */