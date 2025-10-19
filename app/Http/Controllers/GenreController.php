<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // Read all
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    // Create all
    public function store(Request $request)
    {
        // DIPERBAIKI: Mengubah 'name' menjadi 'nama' dan menambahkan 'deskripsi' 
        // agar sesuai dengan Model fillable dan skema DB.
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string'
        ]);

        $genre = Genre::create($validated);
        return response()->json([
            'message' => 'Genre berhasil dibuat',
            'data' => $genre
        ], 201);
    }
}