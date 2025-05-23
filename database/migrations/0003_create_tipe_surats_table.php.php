<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipe_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tipe');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipe_surats');
    }
};