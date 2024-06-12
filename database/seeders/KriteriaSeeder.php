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
        ['nama' => 'biaya tiket masuk', 'jenis' => 'Cost', 'bobot' => 0.3],
        ['nama' => 'fasilitas', 'jenis' => 'Benefit', 'bobot' => 0.2],
        ['nama' => 'kebersihan', 'jenis' => 'Benefit', 'bobot' => 0.2],
        ['nama' => 'keamanan', 'jenis' => 'Benefit', 'bobot' => 0.2],
        ['nama' => 'biaya akomodasi', 'jenis' => 'Cost', 'bobot' => 0.1],
    ]);
}

}
