<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SauceController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('sauces', SauceController::class);
    Route::post('/sauces/{id}/like', [SauceController::class, 'like']);
});

// Authentication routes
Route::post('/auth/signup', [AuthController::class, 'signup']);
Route::post('/auth/login', [AuthController::class, 'login']);

// Sauce routes
Route::get('/sauces', [SauceController::class, 'index']);
Route::get('/sauces/{id}', [SauceController::class, 'show']);
Route::post('/sauces', [SauceController::class, 'store']);
Route::put('/sauces/{id}', [SauceController::class, 'update']);
Route::delete('/sauces/{id}', [SauceController::class, 'destroy']);
Route::post('/sauces/{id}/like', [SauceController::class, 'like']);