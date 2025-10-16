<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::created([
          'Nama' => 'Fiksi',
          'Deskripsi' => 'Buku ini berisi cerita fiktif'
        ]);

        Genre::created([
        'Nama' => 'Non-Fiksi',
        'Deskripsi' => 'Buku ini berisi cerita berdasarkan kisah nyata'
        ]);

        Genre::created([
        'Nama' => 'Fantasi',
        'Deskripsi' => 'Buku ini berisi kisah khayalan'
        ]);

        Genre::created([
        'Nama' => 'Sejarah',
        'Deskripsi' => 'Buku ini berisi kisah history yang terjadi di masa lalu'
        ]);

        Genre::created([
        'Nama' => 'Romance',
        'Deskripsi' => 'Buku ini berisi kisah romantis'
        ]);
    }
}
