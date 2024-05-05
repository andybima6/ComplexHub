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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_warga');
            $table->string('nama_usaha');
            $table->text('deskripsi')->nullable();
            $table->string('foto_produk')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('penduduk')
                ->cascadeOnDelete()
                ->restrictOnUpdate();
            $table->string('status_rt')->nullable();
            $table->string('status_rw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
