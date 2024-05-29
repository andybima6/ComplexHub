<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIuranTable extends Migration
{
    public function up()
    {
        Schema::create('iuran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('periode');
            $table->decimal('total', 8, 2);
            $table->string('keterangan');
            $table->string('bukti');
            $table->unsignedBigInteger('rt_id');

            // Foreign key constraint
            $table->foreign('rt_id')->references('id')->on('data_rt');
        });
    }

    public function down()
    {
        Schema::dropIfExists('iuran');
    }
}
