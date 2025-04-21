<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('file_name'); // Nama file
            $table->binary('file_content'); // Isi file (BLOB)
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat');
    }
}
