<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_barang_pembelian', function (Blueprint $table) {
            $table->id();

            $table->string('detail_pembelian_nama_barang')->nullable();
            $table->dateTime('detail_pembelian_tanggal')->nullable();
            $table->string('detail_pembelian_no_invoice')->nullable();
            $table->string('detail_pembelian_no_po')->nullable();
            $table->string('detail_pembelian_jumlah_perbarang')->nullable();
            $table->string('detail_pembelian_harga_satuan')->nullable();
            $table->string('detail_pembelian_total_harga')->nullable();
            $table->string('detail_pembelian_kondisi')->nullable();

            $table->unsignedBigInteger('pembelian_id')->nullable()->default(null);
            $table->foreign('pembelian_id')->references('id')->on('pembelian')->onDelete('cascade');

            $table->unsignedBigInteger('barang_id')->nullable()->default(null);
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_barang_pembelian');
    }
};
