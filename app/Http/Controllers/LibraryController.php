<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;

class LibraryController extends Controller
{
    public function showGenres()
    {
        // DIPERBAIKI: Menggunakan metode Eloquent yang benar
        $genres = Genre::all(); 
        return view('genres', compact('genres'));
    }

    public function showAuthors()
    {
        // DIPERBAIKI: Menggunakan metode Eloquent yang benar
        $authors = Author::all(); 
        return view('authors', compact('authors'));
    }
}