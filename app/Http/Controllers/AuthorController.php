<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request; // DIPERBAIKI: Menambahkan import Request

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return response()->json($authors);
    }

    public function show($id)
    {
        $author = Author::with('books')->find($id);
        if (!$author) {
            return response()->json(['message' => 'Author not found'], 404);
        }
        return response()->json($author);
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string'
    ]);

    $author = Author::create($validated); // Menggunakan Author::create() karena sudah di-import

    return response()->json([
        'message' => 'Author berhasil dibuat',
        'data' => $author
    ], 201);
    }
}