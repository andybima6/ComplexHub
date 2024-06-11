<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('kriterias')->insert([
        ['kriteria' => 'biaya tiket masuk', 'jenis' => 'benefit', 'bobot' => 0.3],
        ['kriteria' => 'fasilitas', 'jenis' => 'cost', 'bobot' => 0.2],
        ['kriteria' => 'kebersihan', 'jenis' => 'benefit', 'bobot' => 0.2],
        ['kriteria' => 'keamanan', 'jenis' => 'cost', 'bobot' => 0.2],
        ['kriteria' => 'biaya akomodasi', 'jenis' => 'benefit', 'bobot' => 0.1],
    ]);
}

}
