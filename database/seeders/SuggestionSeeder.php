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
                'tanggal' => '2024-01-01',
                'field' => 'Field 1',
                'name' => 'aku',
                'laporan' => 'Laporan 1',
                'rt_id' => $rts->random()->id,
            ],
            [
                'tanggal' => '2024-01-02',
                'field' => 'Field 2',
                'name' => 'aku',
                'laporan' => 'Laporan 2',
                'rt_id' => $rts->random()->id,
            ],
            [
                'tanggal' => '2024-01-03',
                'field' => 'Field 3',
                'name' => 'aku',
                'laporan' => 'Laporan 3',
                'rt_id' => $rts->random()->id,
            ],
            // Tambahkan data suggestion lainnya sesuai kebutuhan
        ];

        // Insert data suggestions
        foreach ($suggestions as $suggestion) {
            Suggestion::create($suggestion);
        }
    }
}
