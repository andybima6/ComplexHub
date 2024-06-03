<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            CriteriaSeeder::class,
            AlternativeSeeder::class,
            PenilaianSeeder::class,
            RtSeeder::class,
            ActivitySeeder::class,
            UmkmSeeder::class,
            DataKartuKeluargaSeeder::class,
            AnggotaKeluargaSeeder::class,
            SuggestionSeeder::class,
            IuranSeeder::class,
            // DataKkSeeder::class,
            // PendudukSeeder::class,
            // WargaSeeder::class,
            // DataRtSeeder::class,


        ]);

    }
}
