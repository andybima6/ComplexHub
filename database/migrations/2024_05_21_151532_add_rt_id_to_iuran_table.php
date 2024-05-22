<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('iuran', function (Blueprint $table) {
            // Assuming the `data_rt` table has a primary key column named `id`
            $table->unsignedBigInteger('rt_id');

            // Add foreign key constraint
            $table->foreign('rt_id')
                ->references('id')
                ->on('data_rt')
                ->onDelete('cascade'); // Optional: specify the action on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iuran', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['rt_id']);

            // Drop the column
            $table->dropColumn('rt_id');
        });
    }
};
