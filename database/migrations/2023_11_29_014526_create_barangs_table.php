<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();

            $table->string('barang_nama')->nullable();
            $table->string('barang_satuan')->nullable();
            $table->string('barang_sisa_stok_gudang')->nullable();

            $table->unsignedBigInteger('kategoribarang_id')->nullable()->default(null);
            $table->foreign('kategoribarang_id')->references('id')->on('kategori_barang')->onDelete('cascade');

            $table->unsignedBigInteger('jenisbarang_id')->nullable()->default(null);
            $table->foreign('jenisbarang_id')->references('id')->on('jenis_barang')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
