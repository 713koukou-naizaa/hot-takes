<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SauceController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('sauces', SauceController::class);
});