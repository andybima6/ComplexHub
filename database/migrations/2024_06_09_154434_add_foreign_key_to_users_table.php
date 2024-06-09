<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Pastikan kolom rt_id sudah ada
            if (!Schema::hasColumn('users', 'rt_id')) {
                $table->unsignedBigInteger('rt_id');
            }

            // Tambahkan constraint foreign key
            $table->foreign('rt_id')->references('id')->on('rts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rt_id']);
        });
    }
}
