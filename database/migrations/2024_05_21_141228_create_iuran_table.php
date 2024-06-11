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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('nama');
            $table->date('periode');
            $table->decimal('total', 8, 2);
            $table->string('keterangan');
            $table->string('bukti');
            $table->unsignedBigInteger('rt_id');
            $table->string('status');
            // Foreign key constraint
            $table->foreign('rt_id')->references('id')->on('rts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('iuran');
    }
}
