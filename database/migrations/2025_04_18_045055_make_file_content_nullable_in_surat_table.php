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
        // Membuat kolom file_content menjadi nullable
        $table->binary('file_content')->nullable()->change();  // Kolom file_content menjadi nullable
    });
}

public function down()
{
    Schema::table('surat', function (Blueprint $table) {
        // Mengembalikan kolom file_content menjadi tidak nullable
        $table->binary('file_content')->change();  // Menjadi tidak nullable
    });
}

};
