<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('surat_pengajuans', function (Blueprint $table) {
            $table->id(); // HANYA SATU KALI
            
            $table->foreignId('user_id')->constrained();
            $table->foreignId('tipe_surat_id')->constrained(); // HANYA SATU KALI
            $table->foreignId('prodi_id')->constrained();
            
            $table->string('semester')->nullable();
            $table->text('keperluan')->nullable();
            $table->string('kode_mk')->nullable();
            $table->string('nama_mk')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('topik')->nullable();
            $table->string('status')->default('Pending');
            $table->string('file_path')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_pengajuans');
    }
};