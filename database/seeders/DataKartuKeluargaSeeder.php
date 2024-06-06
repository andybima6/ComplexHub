<?php

namespace Database\Seeders;

use App\Models\RT;
use Illuminate\Database\Seeder;
use App\Models\DataKartuKeluarga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataKartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { $rts = RT::all();

        if ($rts->isEmpty()) {
            // Handle the case where there are no RT records
            $this->command->info('No RT records found. Please seed the RT table first.');
            return;
        }
        $dataKartuKeluarga = [
            [
                'kepala_keluarga' => 'John Doe',
                'no_kk' => '1234567890',
                'alamat' => '123 Main St',
                'rt_id' =>1,
                // 'status_ekonomi' => 'mampu',
            ], 
            [
                'kepala_keluarga' => 'Jane Smith',
                'no_kk' => '0987654321',
                'alamat' => '456 Elm St',
                'rt_id' => 2,
                // 'status_ekonomi' => 'mampu',
            ],
            [
                'kepala_keluarga' => 'Michael Johnson',
                'no_kk' => '5678901234',
                'alamat' => '789 Oak St',
                'rt_id' => 3,
                // 'status_ekonomi' => 'tidak mampu',
            ],
            [
                'kepala_keluarga' => 'Emily Brown',
                'no_kk' => '6789012345',
                'alamat' => '321 Pine St',
                'rt_id' => 4,
                // 'status_ekonomi' => 'mampu',
            ],
            [
                'kepala_keluarga' => 'David Wilson',
                'no_kk' => '3456789012',
                'alamat' => '555 Maple St',
                'rt_id' => 5,
                // 'status_ekonomi' => 'tidak mampu',
            ],
            [
                'kepala_keluarga' => 'Emma Watson',
                'no_kk' => '2345678987654',
                'alamat' => '765 Maple St',
                'rt_id' => 6,
                // 'status_ekonomi' => 'mampu',
            ],
            [
                'kepala_keluarga' => 'Kim Soojung',
                'no_kk' => '356787654',
                'alamat' => '349 Maple St',
                'rt_id' => 7,
                // 'status_ekonomi' => 'mampu',
            ],
        ];

        foreach ($dataKartuKeluarga as $data) {
            DataKartuKeluarga::create($data);
        }
    }
}
