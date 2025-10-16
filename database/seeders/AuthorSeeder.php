<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Anton Maskulin',
            'bio' => 'Penulis fiksi klasik'
        ]);

        Author::create([
            'name' => 'Alfaritzi Mustofa',
            'bio' => 'Penulis Buku Sejarah'
        ]);

        Author::create([
            'name' => 'Agus Hadikusuma',
            'bio' => 'Penulis Buku Romance'
        ]);
    }
}
