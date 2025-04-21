<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('surat', function (Blueprint $table) {
        $table->longText('file_content')->change(); // Mengubah kolom file_content menjadi LONGTEXT
    });
}

public function down()
{
    Schema::table('surat', function (Blueprint $table) {
        $table->string('file_content')->change(); // Mengembalikan kolom ke tipe semula
    });
}

};
