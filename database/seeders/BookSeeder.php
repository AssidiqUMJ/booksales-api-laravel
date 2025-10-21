<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Mereka Kembali',
            'description' => 'Buku ini tentang sejarah perjuangan kemerdekaan indonesia',
            'price' => 70000,
            'stock' => 15,
            'cover_photo' => 'MerekaKembali.jpg',
            'genre_id' => 4,
            'author_id' => 2
        ]);

        Book::create([
            'title' => 'Petualang Komoda dan harimau',
            'description' => 'Buku ini tentang kisah petualang komoda dan harimau',
            'price' => 59000,
            'stock' => 8,
            'cover_photo' => 'KomodoHarimau.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ]);

         Book::create([
            'title' => 'Romeo dan Juliat',
            'description' => 'Buku ini tentang kisah cinta kasih romeo dan juliat',
            'price' => 120000,
            'stock' => 20,
            'cover_photo' => 'RomeoJuliat.jpg',
            'genre_id' => 5,
            'author_id' => 4
        ]);

    }
}
