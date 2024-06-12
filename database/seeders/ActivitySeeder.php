<?php

namespace Database\Seeders;

use App\Models\RT;
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
        $rts = RT::all();

        if ($rts->isEmpty()) {
            // Handle the case where there are no RT records
            $this->command->info('No RT records found. Please seed the RT table first.');
            return;
        }
            Activity::create([
                'user_id' => 10,
                'name' => 'bejo',
                'description' => 'Keterangan kegiatan 1',
                'document' => 'path/to/document1.jpg',
                'status' => 'pending',
                'rt_id' => 3,
            ]);

            Activity::create([
                'user_id' => 9,
                'name' => 'andy',
                'description' => 'Keterangan kegiatan 2',
                'document' => 'path/to/document2.jpg',
                'status' => 'pending',
                'rt_id' => 2,
            ]);

            // Tambahkan data kegiatan lainnya sesuai kebutuhan
        }
    }

