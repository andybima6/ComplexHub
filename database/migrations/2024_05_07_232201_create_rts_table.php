<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsTable extends Migration
{
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('rt_id');
            $table->string('alamat');
            $table->string('nomor_telefon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rts');
    }
}
