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

    // Create
    public function store(Request $request)
    {
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

    // PERBAIKAN: Menambahkan method show
    public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
        return response()->json($genre);
    }

    // PERBAIKAN: Menambahkan method update
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string'
        ]);

        $genre->update($validated);
        
        return response()->json([
            'message' => 'Genre berhasil diperbarui',
            'data' => $genre
        ]);
    }
    
    // PERBAIKAN: Menambahkan method destroy
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json(['message' => 'Genre not found'], 404);
        }

        $genre->delete();

        return response()->json(['message' => 'Genre berhasil dihapus']);
    }
}