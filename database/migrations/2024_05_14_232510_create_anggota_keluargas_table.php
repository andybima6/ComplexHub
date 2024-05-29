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
            $table->foreignId('kk_id')->constrained('data_kartu_keluargas')->onDelete('cascade');
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->enum('hubungan_keluarga', ['Ibu', 'Ayah', 'Anak']);
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-laki']);
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('status_perkawinan', ['Menikah', 'Belum Menikah']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_keluargas');
    }
}


