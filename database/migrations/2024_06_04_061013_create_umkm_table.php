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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('nama_warga');
            $table->string('nama_usaha');
            $table->text('deskripsi')->nullable();
            $table->string('foto_produk')->nullable();   
            $table->foreignId('rt_id')->constrained('rts')->onDelete('cascade');
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
