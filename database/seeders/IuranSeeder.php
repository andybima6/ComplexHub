<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Iuran;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Iuran::insert([
            [
                'nama' => 'Andy',
                'periode' => '2024-10-19',
                'total' => 100000,
                'keterangan' => 'Iuran Januari',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'diproses',
            ],
            [
                'nama' => 'Arya',
                'periode' => '2024-10-19',
                'total' => 150000,
                'keterangan' => 'Iuran Februari',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'ditolak',
            ],
            [
                'nama' => 'Kinata',
                'periode' => '2024-10-19',
                'total' => 200000,
                'keterangan' => 'Iuran Maret',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'disetujui',
            ],
            [
                'nama' => 'Ellois',
                'periode' => '2024-10-19',
                'total' => 250000,
                'keterangan' => 'Iuran April',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 2,
                'status' => 'ditolak',
            ],
            [
                'nama' => 'Sovy',
                'periode' => '2024-10-19',
                'total' => 300000,
                'keterangan' => 'Iuran Mei',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 2,
                'status' => 'disetujui',
            ],
            [
                'nama' => 'Andy',
                'periode' => '2024-10-19',
                'total' => 100000,
                'keterangan' => 'Iuran Januari',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 2,
                'status' => 'diproses',
            ],
        ]);
    }
}
