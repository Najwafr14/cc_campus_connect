<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToSuratTable extends Migration
{
    /**
     * Menjalankan migrasi untuk menambahkan kolom baru ke tabel 'surat'.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->unsignedBigInteger('surat_pengajuan_id')->nullable(); // Menambahkan kolom baru
        });
    }

    /**
     * Membatalkan migrasi ini jika diperlukan.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat', function (Blueprint $table) {
            $table->dropColumn('surat_pengajuan_id'); // Menghapus kolom jika migrasi dibatalkan
        });
    }
}
