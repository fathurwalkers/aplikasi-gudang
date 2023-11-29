<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_barang_penjualan', function (Blueprint $table) {
            $table->id();

            $table->string('detail_penjualan_nama_barang')->nullable();
            $table->dateTime('detail_penjualan_tanggal')->nullable();
            $table->string('detail_penjualan_no_invoice')->nullable();
            $table->string('detail_penjualan_no_po')->nullable();
            $table->string('detail_penjualan_jumlah')->nullable();
            $table->string('detail_penjualan_harga_jual_perbarang')->nullable();

            $table->unsignedBigInteger('detail_barang_pembelian_id')->nullable()->default(null);
            $table->foreign('detail_barang_pembelian_id')->references('id')->on('detail_barang_pembelian')->onDelete('cascade');

            $table->unsignedBigInteger('penjualan_id')->nullable()->default(null);
            $table->foreign('penjualan_id')->references('id')->on('penjualan')->onDelete('cascade');

            $table->unsignedBigInteger('barang_id')->nullable()->default(null);
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_barang_penjualan');
    }
};
