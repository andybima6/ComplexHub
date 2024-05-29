<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Alternative;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

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
        $criterias = Criteria::all(); // Mengambil semua criteria
        $i = 0;
        foreach ($alternatives as $alternative) {
            // $criteria = $criterias->random(); // Mengambil criteria secara acak
            Penilaian::create([
                'alternative_id' => $alternative->id,
                'criteria_id' => $criterias[$i]['id'],
                'biaya_tiket_masuk' => $faker->randomFloat(2, 10, 100),
                'fasilitas' => $faker->randomFloat(2, 1, 5),
                'kebersihan' => $faker->randomFloat(2, 1, 5),
                'keamanan' => $faker->randomFloat(2, 1, 5),
                'biaya_akomodasi' => $faker->randomFloat(2, 10, 1000),
            ]);
            $i++;
        }
    }
}
