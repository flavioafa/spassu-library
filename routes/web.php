<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return inertia('Home');
    })->name('home');
});
