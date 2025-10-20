<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // PERHATIAN: Pastikan tabel users Anda memiliki kolom `is_admin` (boolean) 
        // dan diatur ke true untuk pengguna admin, atau ganti logika ini sesuai 
        // dengan implementasi otorisasi peran Anda.
        
        // 1. Periksa autentikasi menggunakan Sanctum
        if (! Auth::guard('sanctum')->check()) {
            // Jika tidak terautentikasi, kembalikan 401
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $user = Auth::guard('sanctum')->user();

        // 2. Periksa otorisasi Admin
        if (! $user->is_admin) {
            // Jika terautentikasi tetapi bukan admin, kembalikan 403 (Forbidden)
            return response()->json([
                'message' => 'Unauthorized. Admin access required.',
            ], 403);
        }

        return $next($request);
    }
}