<?php

namespace App\Models;

class Author
{
    public static function getAll()
    {
        return [
            ['id' => 1, 'nama' => 'Tere Liye', 'bio' => ''],
            ['id' => 2, 'nama' => 'Andrea Hirata', 'bio' => ''],
            ['id' => 3, 'nama' => 'Dewi Lestari', 'bio' => ''],
            ['id' => 4, 'nama' => 'Pramoedya Ananta Toer', 'bio' => ''],
            ['id' => 5, 'nama' => 'Ahmad Fuadi', 'bio' => ''],
        ];
    }
}
