<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return inertia('Home');
    })->name('home');

    Route::controller(AuthorController::class)->group(function () {
        Route::get('autores', [AuthorController::class, 'index'])->name('authors.index');
        Route::post('autores', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('autores/criar', [AuthorController::class, 'create'])->name('authors.create');
        Route::get('autores/{author}', [AuthorController::class, 'show'])->name('authors.show');
        Route::put('autores/{author}', [AuthorController::class, 'update'])->name('authors.update');
        Route::delete('autores/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
    });

    Route::controller(SubjectController::class)->group(function () {
        Route::get('assuntos', [SubjectController::class, 'index'])->name('subjects.index');
        Route::post('assuntos', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('assuntos/criar', [SubjectController::class, 'create'])->name('subjects.create');
        Route::get('assuntos/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
        Route::put('assuntos/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::delete('assuntos/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('livros', [BookController::class, 'index'])->name('books.index');
        Route::post('livros', [BookController::class, 'store'])->name('books.store');
        Route::get('livros/criar', [BookController::class, 'create'])->name('books.create');
        Route::get('livros/{book}', [BookController::class, 'show'])->name('books.show');
        Route::put('livros/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('livros/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    });

});
