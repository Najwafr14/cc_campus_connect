<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->default(1)->constrained('roles');
            $table->foreignId('prodi_id')->constrained('prodis');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['prodi_id']);
            $table->dropColumn(['role_id', 'prodi_id']);
        });
    }
};