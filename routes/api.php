<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

// Group for Public Read Access (index, show) - Aksesibel untuk semua orang
Route::middleware('api')->group(function () {
    
    // Books - Read All dan Show (Sesuai dengan file BookController yang ada)
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);

    // Authors - Read All dan Show
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{id}', [AuthorController::class, 'show']);

    // Genres - Read All dan Show
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{id}', [GenreController::class, 'show']); 
});

// Group for Admin Access (store, update, destroy) - Hanya dapat diakses oleh Admin
// Menerapkan middleware 'admin' yang telah didaftarkan di Kernel.php
Route::middleware(['api', 'admin'])->group(function () {
    // Authors - Create, Update, Destroy
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']); 
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

    // Genres - Create, Update, Destroy
    Route::post('/genres', [GenreController::class, 'store']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
    
    // Anda juga dapat menambahkan rute Books CRUD lainnya di sini jika diperlukan admin.
});