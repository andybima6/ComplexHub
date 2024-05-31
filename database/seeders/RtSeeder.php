<?php

namespace Database\Seeders;

use App\Models\RT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rts = [
            ['nama' => 'Brian Domani', 'alamat' => '123 Main St', 'nomor_telefon' => '123-456-7890', 'rt_id' => 1],
            ['nama' => 'Jacob Satorius', 'alamat' => '456 Main St', 'nomor_telefon' => '123-456-7890', 'rt_id' => 2],
            ['nama' => 'Alice', 'alamat' => '789 Main St', 'nomor_telefon' => '123-456-7891', 'rt_id' => 3],
            ['nama' => 'Bob', 'alamat' => '987 Main St', 'nomor_telefon' => '123-456-7892', 'rt_id' => 4],
            ['nama' => 'Charlie', 'alamat' => '654 Main St', 'nomor_telefon' => '123-456-7893', 'rt_id' => 5],
            ['nama' => 'Diana', 'alamat' => '321 Main St', 'nomor_telefon' => '123-456-7894', 'rt_id' => 6],
            ['nama' => 'Edward', 'alamat' => '789 Main St', 'nomor_telefon' => '123-456-7895', 'rt_id' => 7],
        ];

        foreach ($rts as $rt) {
            RT::create($rt);
        }
    }
}
