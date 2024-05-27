<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKartuKeluargasTable extends Migration
{
    public function up()
    {
        Schema::create('data_kartu_keluargas', function (Blueprint $table) {
            $table->id();
            $table->string('kepala_keluarga');
            $table->string('no_kk');
            $table->string('alamat');
            $table->foreignId('rt_id')->constrained('rts')->onDelete('cascade');
            $table->enum('status_ekonomi', ['mampu', 'tidak mampu']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_kartu_keluargas');
    }
}
