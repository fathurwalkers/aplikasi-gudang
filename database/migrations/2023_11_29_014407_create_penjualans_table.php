<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();

            $table->string('penjualan_nama_customer')->nullable();
            $table->dateTime('penjualan_tanggal')->nullable();
            $table->string('penjualan_nomor_invoice')->nullable();
            $table->string('penjualan_no_po')->nullable();
            $table->string('penjualan_jumlah')->nullable();
            $table->string('penjualan_total_harga')->nullable();
            $table->string('penjualan_status_pembayaran')->nullable();

            $table->unsignedBigInteger('customer_id')->nullable()->default(null);
            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
