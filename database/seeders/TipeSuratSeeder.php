<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeSuratSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipe_surats')->insert([
            ['nama_tipe' => 'Surat Keterangan Mahasiswa Aktif'],
            ['nama_tipe' => 'Surat Pengantar Tugas Kuliah'],
            ['nama_tipe' => 'Surat Keterangan Lulus'],
            ['nama_tipe' => 'Surat Laporan Hasil Studi'],
        ]);
    }
}