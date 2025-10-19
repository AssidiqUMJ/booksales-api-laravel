<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // DIPERBAIKI: Mengubah fillable agar sesuai dengan kolom 'nama' dan 'deskripsi' di migrasi.
    protected $fillable = ['nama', 'deskripsi'];
    
}