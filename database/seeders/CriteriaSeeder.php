<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Criteria;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Criteria::create([
            'kriteria' => 'biaya tiket masuk',
            'jenis' => 'benefit',
            'bobot' => 0.5,
        ]);

        Criteria::create([
            'kriteria' => 'fasilitas',
            'jenis' => 'cost',
            'bobot' => 0.3,
        ]);

        Criteria::create([
            'kriteria' => 'kebersihan',
            'jenis' => 'benefit',
            'bobot' => 0.8,
        ]);

        Criteria::create([
            'kriteria' => 'keamanan',
            'jenis' => 'cost',
            'bobot' => 0.2,
        ]);

        Criteria::create([
            'kriteria' => 'biaya akomodasi            ',
            'jenis' => 'benefit',
            'bobot' => 0.7,
        ]);
    }
}
