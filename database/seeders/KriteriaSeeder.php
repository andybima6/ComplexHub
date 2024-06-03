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
        ['nama' => 'biaya tiket masuk', 'jenis' => 'benefit', 'bobot' => 0.5],
        ['nama' => 'fasilitas', 'jenis' => 'cost', 'bobot' => 0.3],
        ['nama' => 'kebersihan', 'jenis' => 'benefit', 'bobot' => 0.8],
        ['nama' => 'keamanan', 'jenis' => 'cost', 'bobot' => 0.2],
        ['nama' => 'biaya akomodasi', 'jenis' => 'benefit', 'bobot' => 0.7],
    ]);
}

}
