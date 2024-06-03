<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SAWController extends Controller
{
    public function calculateSAW()
    {
        $breadcrumb = (object)[
            'title' => 'Penilaian',
            'subtitle' => 'Destinasi Wisata dengan Perhitungan SAW',
        ];
        // Ambil data alternatif dan kriteria
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        // Inisialisasi skor akhir
        $skor = [];

        // Hitung skor akhir untuk setiap alternatif
        foreach ($alternatifs as $alternatif) {
            $totalSkor = 0;
            foreach ($kriterias as $kriteria) {
                // Hitung nilai bobot normalisasi
                $nilaiNormalisasi = $this->calculateNormalizedValue($alternatif, $kriteria);

                // Hitung skor dengan bobot
                $totalSkor += $nilaiNormalisasi * $kriteria->bobot;
            }
            // Simpan skor akhir
            $skor[$alternatif->id] = $totalSkor;
        }

        // Sort skor secara descending
        arsort($skor);

        // Tampilkan hasil perhitungan
        return view('saw.hasil', compact('skor', 'alternatifs', 'breadcrumb'));
    }

    private function calculateNormalizedValue($alternatif, $kriteria)
{
    // Hitung nilai normalisasi sesuai jenis kriteria
    $nilai = $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? 0;
    
    // Pastikan max_value tidak nol untuk menghindari pembagian oleh nol
    $max_value = $kriteria->max_value != 0 ? $kriteria->max_value : 1;
    
    if ($kriteria->jenis == 'benefit') {
        return $nilai / $max_value;
    }
    // Tambahkan penanganan untuk kriteria dengan jenis 'cost' jika diperlukan
}

}
