<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penilaian;
use App\Models\Alternative;
use Faker\Factory as Faker;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $alternatives = Alternative::all();

        foreach ($alternatives as $alternative) {
            Penilaian::create([
                'alternative_id' => $alternative->id,
                'bobot' => $faker->numberBetween(1, 100),
                'biaya_tiket_masuk' => $faker->randomFloat(2, 10, 100),
                'fasilitas' => $faker->randomFloat(2, 1, 5),
                'kebersihan' => $faker->randomFloat(2, 1, 5),
                'keamanan' => $faker->randomFloat(2, 1, 5),
                'biaya_akomodasi' => $faker->randomFloat(2, 10, 1000),
            ]);
        }
    }
}

