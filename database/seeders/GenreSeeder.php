<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre; // DIPERBAIKI: Menambahkan import model Genre

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DIPERBAIKI: Mengganti ::created() dengan ::create() dan memperbaiki casing key menjadi snake_case.
        Genre::create([
          'nama' => 'Fiksi',
          'deskripsi' => 'Buku ini berisi cerita fiktif'
        ]);

        Genre::create([
        'nama' => 'Non-Fiksi',
        'deskripsi' => 'Buku ini berisi cerita berdasarkan kisah nyata'
        ]);

        Genre::create([
        'nama' => 'Fantasi',
        'deskripsi' => 'Buku ini berisi kisah khayalan'
        ]);

        Genre::create([
        'nama' => 'Sejarah',
        'deskripsi' => 'Buku ini berisi kisah history yang terjadi di masa lalu'
        ]);

        Genre::create([
        'nama' => 'Romance',
        'deskripsi' => 'Buku ini berisi kisah romantis'
        ]);
    }
}