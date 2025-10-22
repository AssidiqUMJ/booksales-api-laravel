<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi.
     * Admin: Semua transaksi. User: Transaksi milik sendiri.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->is_admin) {
            // Jika Admin, tampilkan semua transaksi dengan detail relasi
            $transactions = Transaction::with(['customer', 'book'])->get();
        } else {
            // Jika User biasa, tampilkan transaksi miliknya
            $transactions = Transaction::where('customer_id', $user->id)
                                        ->with('book')
                                        ->get();
        }

        return response()->json($transactions);
    }

    /**
     * Membuat Transaksi Baru (Pembelian).
     */
    public function store(Request $request)
    {
        // Memastikan user terautentikasi
        if (! Auth::check()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }
        
        // 1. Validasi Input
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            // order_number akan di-generate
        ]);
        
        // 2. Ambil Data Buku dan Lakukan Pengecekan
        $book = Book::find($validated['book_id']);

        if ($book->stock < $validated['quantity']) {
            return response()->json(['message' => 'Stok buku tidak mencukupi.'], 400);
        }
        
        // Memulai transaksi database untuk memastikan konsistensi
        DB::beginTransaction();

        try {
            $totalAmount = $book->price * $validated['quantity'];
            $orderNumber = 'PO-' . time() . '-' . Auth::id();

            // 3. Kurangi Stok Buku
            $book->stock -= $validated['quantity'];
            $book->save();
            
            // 4. Buat Transaksi
            $transaction = Transaction::create([
                'order_number' => $orderNumber,
                'customer_id' => Auth::id(), // ID pelanggan dari user yang login
                'book_id' => $validated['book_id'],
                'quantity' => $validated['quantity'], // Opsional: tambahkan kolom quantity ke migrasi/model jika ingin melacak jumlah
                'total_amount' => $totalAmount,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Transaksi berhasil diproses',
                'data' => $transaction
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Transaksi gagal: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Menampilkan detail satu transaksi.
     */
    public function show($id)
    {
        $transaction = Transaction::with(['customer', 'book'])->find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        
        // Otorisasi: Hanya admin atau pemilik transaksi yang boleh melihat
        $user = Auth::user();
        if (!$user->is_admin && $transaction->customer_id !== $user->id) {
             return response()->json(['message' => 'Unauthorized.'], 403);
        }

        return response()->json($transaction);
    }
    
    // Metode update dan destroy tidak disediakan karena transaksi jarang diperbarui/dihapus dalam sistem riil.
}

// 