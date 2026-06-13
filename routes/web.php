<?php

use Illuminate\Support\Facades\Route;

// Catch-all: serve the Vue SPA for every web request
Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '.*');
