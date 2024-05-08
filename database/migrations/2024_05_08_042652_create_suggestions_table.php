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
        Schema::create('suggestions', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('field');
            $table->string('name');
            $table->string('Laporan')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('rt_id')->nullable();
            // $table->foreign('rt_id')->references('id')->on('data_rt');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
