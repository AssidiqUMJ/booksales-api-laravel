<?php

namespace App\Models;

class Genre
{
    public static function getAll()
    {
        return [
            ['id' => 1, 'nama' => 'Fiksi', 'Deskripsi' => 'Buku ini berisi kisah fiktif'],
            ['id' => 2, 'nama' => 'Non-Fiksi', 'Deskripsi' => 'Buku ini berisi cerita berdasarkan kisah nyata'],
            ['id' => 3, 'nama' => 'Fantasi', 'Deskripsi' => 'Buku ini berisi kisah khayalan'],
            ['id' => 4, 'nama' => 'Sejarah', 'Deskripsi' => 'Buku ini berisi kisah history yang terjadi di masa lalu'],
            ['id' => 5, 'nama' => 'Romansa', 'Deskripsi' => 'Buku ini berisi kisah Romantis'],
        ];
    }
}
