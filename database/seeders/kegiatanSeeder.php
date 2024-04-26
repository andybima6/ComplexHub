<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan; // Pastikan model Kegiatan di-import

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kegiatan::create([
            'nama' => 'Kegiatan 1',
            'keterangan' => 'Keterangan kegiatan 1',
            'document' => 'path/to/document1.jpg',
            'comment' => 'Comment kegiatan 1',
            'status' => 'pending',
        ]);

        Kegiatan::create([
            'nama' => 'Kegiatan 2',
            'keterangan' => 'Keterangan kegiatan 2',
            'document' => 'path/to/document2.jpg',
            'comment' => 'Comment kegiatan 2',
            'status' => 'pending',
        ]);

        // Tambahkan data kegiatan lainnya sesuai kebutuhan
    }
}
