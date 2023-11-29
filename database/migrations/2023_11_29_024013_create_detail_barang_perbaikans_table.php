<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_barang_perbaikan', function (Blueprint $table) {
            $table->id();

            $table->string('detail_perbaikan_nama_barang')->nullable();
            $table->string('detail_perbaikan_jumlah')->nullable();
            $table->dateTime('detail_perbaikan_tanggal')->nullable();
            $table->string('detail_perbaikan_sisa')->nullable();
            $table->string('detail_perbaikan_gambar')->nullable();
            $table->text('detail_perbaikan_keterangan')->nullable();

            $table->unsignedBigInteger('detail_barang_pembelian_id')->nullable()->default(null);
            $table->foreign('detail_barang_pembelian_id')->references('id')->on('detail_barang_pembelian')->onDelete('cascade');

            $table->unsignedBigInteger('pegawai_id')->nullable()->default(null);
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_barang_perbaikan');
    }
};
