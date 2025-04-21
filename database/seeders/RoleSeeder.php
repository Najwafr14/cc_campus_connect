<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['nama_role' => 'Mahasiswa'],
            ['nama_role' => 'Kaprodi'],
            ['nama_role' => 'Tata Usaha'],
        ]);
    }
}