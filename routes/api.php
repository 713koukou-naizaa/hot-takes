<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SauceController;

Route::apiResource('sauces', SauceController::class);