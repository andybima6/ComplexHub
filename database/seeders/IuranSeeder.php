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
                'nama' => 'Budi',
                'periode' => '2024-10-19',
                'total' => 100000,
                'keterangan' => 'Iuran Januari',
                'bukti' => asset('img/bukti.jpg'),
                'rt_id' => 1,
                'status' => 'disetujui',
            ],
            [
                'nama' => 'Andi',
                'periode' => '2024-10-19',
                'total' => 150000,
                'keterangan' => 'Iuran Februari',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 2,
                'status' => 'ditolak',
            ],
            [
                'nama' => 'Siti',
                'periode' => '2024-10-19',
                'total' => 200000,
                'keterangan' => 'Iuran Maret',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'disetujui',
            ],
            [
                'nama' => 'Joko',
                'periode' => '2024-10-19',
                'total' => 250000,
                'keterangan' => 'Iuran April',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'ditolak',
            ],
            [
                'nama' => 'Ayu',
                'periode' => '2024-10-19',
                'total' => 300000,
                'keterangan' => 'Iuran Mei',
                'bukti' => 'img/bukti.jpg',
                'rt_id' => 1,
                'status' => 'disetujui',
            ],
        ]);
    }
}
