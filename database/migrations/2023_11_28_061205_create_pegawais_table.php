<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

            $table->string('pegawai_nama')->nullable();
            $table->string('pegawai_jabatan')->nullable();
            $table->string('pegawai_alamat')->nullable();
            $table->string('pegawai_nohp')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
