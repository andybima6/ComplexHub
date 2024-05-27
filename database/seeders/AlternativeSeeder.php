<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternative::create([
            'alternatif' => 'Kayutangan heritage',
        ]);

        Alternative::create([
            'alternatif' => '⁠Jatim Park',
        ]);

        Alternative::create([
            'alternatif' => 'Malang Skyland',
        ]);

        Alternative::create([
            'alternatif' => 'Batu Secret Zoo',
        ]);

        Alternative::create([
            'alternatif' => 'Bromo Tengger Semeru National Park',
        ]);
    }
}
