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
