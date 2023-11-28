<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();

            $table->string('customer_nama')->nullable();
            $table->text('customer_alamat')->nullable();
            $table->string('customer_nohp')->nullable();
            $table->string('customer_email')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
