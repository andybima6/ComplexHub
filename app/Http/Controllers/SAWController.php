<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SAWController extends Controller
{
    public function indexpenilaian()
    {
        // Data alternatif (alternatif x kriteria)
        $alternatif = [
            ['Sangat lengkap', 500000, 'Lumayan bersih'],
            ['Lengkap', 1000000, 'Sangat bersih'],
            ['Kurang Lengkap', 850000, 'Lumayan bersih'],
        ];

        // Bobot kriteria (total harus 1)
        $bobot = [0.4, 0.3, 0.2, 0.1];

        // Kriteria (1 untuk benefit, -1 untuk cost)
        $kriteria = [1, -1, 1];

        // Normalisasi matriks keputusan
        $matrix_keputusan = $this->normalisasi($alternatif, $kriteria);

        // Mengalikan matriks yang telah dinormalisasi dengan bobot kriteria
        $matrix_terbobot = $this->terbobot($matrix_keputusan, $bobot);

        // Menentukan nilai akhir untuk setiap alternatif
        $nilai_akhir = array_map('array_sum', $matrix_terbobot);

        // Mengurutkan nilai akhir
        arsort($nilai_akhir);

        return view('saw.index', compact('alternatif', 'matrix_keputusan', 'matrix_terbobot', 'nilai_akhir'));
    }

    private function normalisasi($alternatif, $kriteria)
    {
        $normalisasi = [];
        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($alternatif[$i]); $j++) {
                if ($kriteria[$j] == 1) {
                    $normalisasi[$i][$j] = $alternatif[$i][$j] / max(array_column($alternatif, $j));
                } else {
                    $normalisasi[$i][$j] = min(array_column($alternatif, $j)) / $alternatif[$i][$j];
                }
            }
        }
        return $normalisasi;
    }

    private function terbobot($normalisasi, $bobot)
    {
        $terbobot = [];
        for ($i = 0; $i < count($normalisasi); $i++) {
            for ($j = 0; $j < count($normalisasi[$i]); $j++) {
                $terbobot[$i][$j] = $normalisasi[$i][$j] * $bobot[$j];
            }
        }
        return $terbobot;
    }
}
