<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Pastikan password dienkripsi
        ]);

        User::create([
            'name' => 'M.Yasir',
            'email' => 'petugas1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Risfan Novrian',
            'email' => 'petugas2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Arif',
            'email' => 'petugas3@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}