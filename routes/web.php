<?php

//use App\Http\Controllers\LibraryController;

//Route::get('/genres', [LibraryController::class, 'showGenres']);
//Route::get('/authors', [LibraryController::class, 'showAuthors']);

use App\Http\Controllers\BookController;

Route::get('/books', [BookController::class, 'index']);


