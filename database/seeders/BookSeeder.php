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
            'author_id' => 2
        ]);

        Book::create([
            'title' => 'Langit dan Bumi',
            'author_id' => 1
        ]);

        Book::create([
            'title' => 'Langit dan Bumi',
            'author_id' => 3
        ]);
    }
}
