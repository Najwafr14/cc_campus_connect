<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin TU',
            'email' => 'tu@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, // Tata Usaha
            'prodi_id' => 1, // Teknik Informatika
        ]);
    }
}