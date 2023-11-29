<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();

            $table->string('pembelian_nama_vendor')->nullable();
            $table->dateTime('pembelian_tanggal')->nullable();
            $table->string('pembelian_nomor_invoice')->nullable();
            $table->string('pembelian_no_po')->nullable();
            $table->string('pembelian_jumlah')->nullable();
            $table->string('pembelian_total_harga')->nullable();

            $table->unsignedBigInteger('vendor_id')->nullable()->default(null);
            $table->foreign('vendor_id')->references('id')->on('vendor')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
};
