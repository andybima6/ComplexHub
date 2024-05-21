<?php

namespace Database\Seeders;

use App\Models\DataRt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataRtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DataRt::factory(5)->create();
    }
}
