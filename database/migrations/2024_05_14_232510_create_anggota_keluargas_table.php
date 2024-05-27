<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kk_id');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('hubungan_keluarga');
            $table->timestamps();

            $table->foreign('kk_id')->references('id')->on('data_kartu_keluargas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_keluargas');
    }
}


