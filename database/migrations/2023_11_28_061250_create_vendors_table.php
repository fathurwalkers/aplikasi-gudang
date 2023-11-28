<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();

            $table->string('vendor_nama')->nullable();
            $table->text('vendor_alamat')->nullable();
            $table->string('vendor_nohp')->nullable();
            $table->string('vendor_email')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendor');
    }
};
