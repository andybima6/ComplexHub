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
                'user_id' => 1,
                'nama' => 'Andy',
                'periode' => '2024-10-19',
                'total' => 100000,
                'keterangan' => 'Iuran Januari',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'diproses',
            ],
            [
                'user_id' => 2,
                'nama' => 'Arya',
                'periode' => '2024-10-19',
                'total' => 150000,
                'keterangan' => 'Iuran Februari',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'ditolak',
            ],
            [
                'user_id' => 3,
                'nama' => 'Kinata',
                'periode' => '2024-10-19',
                'total' => 200000,
                'keterangan' => 'Iuran Maret',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'disetujui',
            ],
            [
                'user_id' => 4,
                'nama' => 'Ellois',
                'periode' => '2024-10-19',
                'total' => 250000,
                'keterangan' => 'Iuran April',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 2,
                'status' => 'ditolak',
            ],
            [
                'user_id' => 5,
                'nama' => 'Sovy',
                'periode' => '2024-10-19',
                'total' => 300000,
                'keterangan' => 'Iuran Mei',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 2,
                'status' => 'disetujui',
            ],
            [
                'user_id' => 6,
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
