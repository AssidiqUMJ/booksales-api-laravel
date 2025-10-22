<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
       User::create([
        'name' => 'Assidiq Nurrochman',
        'email' => 'assidiq@example.com',
        'password' => 'admin123',
        'role' => "admin"
       ]); 

       User::create([
        'name' => 'Budi Mulyadi',
        'email' => 'budimlyd@example.com',
        'password' => 'budimlyd123',
        'role' => "customer"
       ]); 

       User::create([
        'name' => 'Muhammad Alikram',
        'email' => 'muhammadal@example.com',
        'password' => 'aalikrm123',
        'role' => "customer"
       ]); 

       User::create([
        'name' => 'Arifin Ilham',
        'email' => 'arifinilhm@example.com',
        'password' => 'admin123',
        'role' => "admin"
       ]); 

       User::create([
        'name' => 'Lukman Hakim',
        'email' => 'lukmanhkm@example.com',
        'password' => 'lkmn123',
        'role' => "customer"
       ]); 
    }
}
