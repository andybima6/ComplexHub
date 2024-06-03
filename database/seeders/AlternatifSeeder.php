<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('alternatifs')->insert([
        ['nama' => 'Kayutangan heritage'],
        ['nama' => 'Jatim Park'],
        ['nama' => 'Malang Skyland'],
        ['nama' => 'Batu Secret Zoo'],
        ['nama' => 'Bromo Tengger Semeru National Park'],
    ]);
}

}
