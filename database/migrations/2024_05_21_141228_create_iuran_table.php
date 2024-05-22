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
            $table->date('periode');
            $table->decimal('total', 8, 2);
            $table->string('keterangan');
            $table->string('bukti');
        });
    }

    public function down()
    {
        Schema::dropIfExists('iuran');
    }
}
