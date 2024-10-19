<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return inertia('Dashboard');
    })->name('dashboard');
});

Route::get('login', function () {
    return inertia('Auth/AuthLogin');
})->name('login');
