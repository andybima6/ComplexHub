<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rt', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama_lengkap');
            $table->integer('usia');
            $table->string('rt_ke');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->date('awal_jabatan');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
