<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_penilaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->foreignId('criteria_id')->constrained('criteria')->onDelete('cascade');
            $table->decimal('tiket', 10, 4);
            $table->decimal('fasilitas', 10, 4);
            $table->decimal('kebersihan', 10, 4);
            $table->decimal('keamanan', 10, 4);
            $table->decimal('akomodasi', 10, 4);
            $table->timestamps();

            $table->foreign('alternative_id')->references('id')->on('alternative')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_penilaians');
    }
};
