<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kepala_keluarga');
            $table->string('image');
            $table->string('no_kk', 16);
            $table->unsignedBigInteger('rt_id');
            $table->foreign('rt_id')->references('id')->on('data_rt')->onDelete('cascade'); // Mengubah referensi ke tabel data_rt
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status_ekonomi',['Mampu','Tidak Mampu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kk');
    }
}
