<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AuthorSeeder::class,
            GenreSeeder::class,
            BookSeeder::class,
            TransactionSeeder::class
        
        ]);
    }
}
