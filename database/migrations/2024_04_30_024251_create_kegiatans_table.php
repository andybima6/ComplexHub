<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('keterangan');
            $table->string('document');
            $table->string('comment');
            $table->string('status');
            $table->unsignedBigInteger('rt_id');
            $table->foreign('rt_id')->references('id')->on('rts');
            $table->timestamps();
        });
    }
    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
