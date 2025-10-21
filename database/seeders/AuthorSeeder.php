<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Bima Jayakusuma',
            'photo' => 'Bima.jpg',
            'bio' => 'Penulis fiksi cartoon'
        ]);

        Author::create([
            'name' => 'Anton Maskulin',
             'photo' => 'Anton.jpg',
            'bio' => 'Penulis fiksi klasik'
        ]);

        Author::create([
            'name' => 'Alfaritzi Mustofa',
             'photo' => 'Mustofa.jpg',
            'bio' => 'Penulis Buku Sejarah'
        ]);

        Author::create([
            'name' => 'Agus Hadikusuma',
            'photo' => 'Agus.jpg',
            'bio' => 'Penulis Buku Romance'
        ]);
    }
}
