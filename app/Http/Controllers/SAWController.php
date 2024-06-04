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

        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        $skor = [];
        $nilaiNormalisasi = [];

        foreach ($alternatifs as $alternatif) {
            $totalSkor = 0;
            foreach ($kriterias as $kriteria) {
                $nilai = $this->calculateNormalizedValue($alternatif, $kriteria);
                $nilaiNormalisasi[$alternatif->id][$kriteria->id] = $nilai;
                $totalSkor += $nilai * $kriteria->bobot;
            }
            $skor[$alternatif->id] = $totalSkor;
        }

        arsort($skor);
        return view('saw.hasil', compact('skor', 'alternatifs', 'breadcrumb', 'kriterias', 'nilaiNormalisasi'));
    }

    private function calculateNormalizedValue($alternatif, $kriteria)
    {
        $nilai = $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? 0;
        $max_value = $kriteria->max_value != 0 ? $kriteria->max_value : 1;
        
        if ($kriteria->jenis == 'benefit') {
            return $nilai / $max_value;
        }
        return $max_value / $nilai;
    }
}
