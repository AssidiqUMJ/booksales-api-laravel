// assidiqumj/booksales-api-laravel/booksales-api-laravel-master/routes/api.php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
// Tambahkan import Controller baru
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\TransactionController; 


// --- Rute Autentikasi (Dapat diakses oleh semua orang) ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Group for Public Read Access (index, show) - Aksesibel untuk semua orang
Route::middleware('api')->group(function () {
    
    // Books - Read All dan Show
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);

    // Authors - Read All dan Show
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/authors/{id}', [AuthorController::class, 'show']);

    // Genres - Read All dan Show
    Route::get('/genres', [GenreController::class, 'index']);
    Route::get('/genres/{id}', [GenreController::class, 'show']); 
    
});

// --- Group untuk Authenticated Users (Non-Admin) ---
// Membutuhkan token Sanctum
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']); // Logout
    
    // Transactions - Create dan View Milik Sendiri
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
});


// Group untuk Admin Access (store, update, destroy) - Hanya dapat diakses oleh Admin
// Menerapkan middleware 'admin' yang telah didaftarkan di Kernel.php
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Authors - Create, Update, Destroy
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::put('/authors/{id}', [AuthorController::class, 'update']); 
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

    // Genres - Create, Update, Destroy
    Route::post('/genres', [GenreController::class, 'store']);
    Route::put('/genres/{id}', [GenreController::class, 'update']);
    Route::delete('/genres/{id}', [GenreController::class, 'destroy']);
    
    // Admin dapat melihat semua transaksi (diimplementasikan di index)
    // Jika perlu CRUD untuk buku, bisa ditambahkan di sini.
});

