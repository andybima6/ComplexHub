<?php

namespace Database\Seeders;

use App\Models\Suggestion;
use App\Models\RT;
use Illuminate\Database\Seeder;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan tabel RT sudah ada dan diisi
        $rts = RT::all();

        if ($rts->isEmpty()) {
            // Handle the case where there are no RT records
            $this->command->info('No RT records found. Please seed the RT table first.');
            return;
        }

        // Data suggestion
        $suggestions = [
            [
                'user_id' => 9,
                'tanggal' => '2024-01-01',
                'field' => 'Field 1',
                'name' => 'Andy',
                'laporan' => 'Laporan 1',
                'rt_id' => 2,
            ],
            [
                'user_id' => 9,
                'tanggal' => '2024-01-02',
                'field' => 'Field 2',
                'name' => 'andy',
                'laporan' => 'Laporan 2',
                'rt_id' => 2,
            ],
            [
                'user_id' => 9,
                'tanggal' => '2024-01-03',
                'field' => 'Field 3',
                'name' => 'andy',
                'laporan' => 'Laporan 3',
                'rt_id' => 2,
            ],
            [
                'user_id' => 10,
                'tanggal' => '2024-01-03',
                'field' => 'Field 3',
                'name' => 'bejo',
                'laporan' => 'Laporan 3',
                'rt_id' => 3,
            ],
            // Tambahkan data suggestion lainnya sesuai kebutuhan
        ];

        // Insert data suggestions
        foreach ($suggestions as $suggestion) {
            Suggestion::create($suggestion);
        }
    }
}
