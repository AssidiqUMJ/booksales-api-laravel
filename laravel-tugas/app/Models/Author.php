<?php

namespace App\Models;

class Author
{
    public static function getAll()
    {
        return [
            ['id' => 1, 'nama' => 'Tere Liye'],
            ['id' => 2, 'nama' => 'Andrea Hirata'],
            ['id' => 3, 'nama' => 'Dewi Lestari'],
            ['id' => 4, 'nama' => 'Pramoedya Ananta Toer'],
            ['id' => 5, 'nama' => 'Ahmad Fuadi'],
        ];
    }
}
