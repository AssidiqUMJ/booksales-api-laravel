<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ ALL: Hanya Admin
    public function index()
    {
        // Mengambil data dengan relasi Author dan Genre
        $books = Book::with(['author', 'genre'])->get();
        return response()->json($books);
    }

    // SHOW: Hanya Customer
    public function show($id)
    {
        // Mengambil data dengan relasi Author dan Genre
        $book = Book::with(['author', 'genre'])->find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);
    }
    
    // STORE: Hanya Customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_photo' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book = Book::create($validated); 

        return response()->json([
            'message' => 'Buku berhasil dibuat',
            'data' => $book
        ], 201);
    }
    
    // UPDATE: Hanya Customer
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'cover_photo' => 'sometimes|required|string',
            'genre_id' => 'sometimes|required|exists:genres,id',
            'author_id' => 'sometimes|required|exists:authors,id',
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Buku berhasil diperbarui',
            'data' => $book
        ]);
    }
    
    // DESTROY: Hanya Admin
    public function destroy($id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Buku berhasil dihapus']);
    }
}