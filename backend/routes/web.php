<?php

use App\Http\Controllers\LocationController;
use App\Http\Middleware\ValidateApiKey;
use Illuminate\Support\Facades\Route;

Route::middleware([ValidateApiKey::class])->group(function () {
    Route::get('/api/locations', [LocationController::class, 'index']);
});
