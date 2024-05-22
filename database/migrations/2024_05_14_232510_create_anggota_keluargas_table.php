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
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->enum('hubungan_keluarga', ['Ibu', 'Ayah', 'Anak']);
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-laki']);
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']); 
            $table->timestamps();

            $table->foreign('kk_id')->references('id')->on('data_kartu_keluargas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_keluargas');
    }
}
