<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity; // Pastikan model Kegiatan di-import

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'name' => 'Kegiatan 1',
            'description' => 'Keterangan kegiatan 1',
            'document' => 'path/to/document1.jpg',
            'comment' => 'Comment kegiatan 1',
            'status' => 'pending',
            'rt_id' => 1,
        ]);

        Activity::create([
            'name' => 'Kegiatan 2',
            'description' => 'Keterangan kegiatan 2',
            'document' => 'path/to/document2.jpg',
            'comment' => 'Comment kegiatan 2',
            'status' => 'pending',
            'rt_id' => 2,
        ]);

        // Tambahkan data kegiatan lainnya sesuai kebutuhan
    }
}
