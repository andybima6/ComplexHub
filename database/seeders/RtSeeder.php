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
            [
                'nama' => 'Brian Domani',
                'rt' => '1',
                'alamat' => '123 Main St',
                'nomor_telefon' => '123-456-7890',
            ],
            [
                'nama' => 'Jacob Satorius',
                'rt' => '2',
                'alamat' => '456 Main St',
                'nomor_telefon' => '123-456-7890',
            ],
            [
                'nama' => 'Alice',
                'rt' => '3',
                'alamat' => '789 Main St',
                'nomor_telefon' => '123-456-7891',
            ],
            [
                'nama' => 'Bob',
                'rt' => '4',
                'alamat' => '987 Main St',
                'nomor_telefon' => '123-456-7892',
            ],
            [
                'nama' => 'Charlie',
                'rt' => '5',
                'alamat' => '654 Main St',
                'nomor_telefon' => '123-456-7893',
            ],
            [
                'nama' => 'Diana',
                'rt' => '6',
                'alamat' => '321 Main St',
                'nomor_telefon' => '123-456-7894',
            ],
            [
                'nama' => 'Edward',
                'rt' => '7',
                'alamat' => '789 Main St',
                'nomor_telefon' => '123-456-7895',
            ],
        ];

        foreach ($rts as $rt) {
            RT::create($rt);
        }
    }
}
