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

        // Calculate max value for each kriteria
        $maxValues = [];
        foreach ($kriterias as $kriteria) {
            $maxValues[$kriteria->id] = $alternatifs->max(function($alternatif) use ($kriteria) {
                return $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? 0;
            });
        }

        $skor = [];
        $nilaiNormalisasi = [];

        foreach ($alternatifs as $alternatif) {
            $totalSkor = 0;
            foreach ($kriterias as $kriteria) {
                error_log("Processing Alternatif: " . $alternatif->nama . ", Kriteria: " . $kriteria->nama);
                
                $nilai = $this->calculateNormalizedValue($alternatif, $kriteria, $maxValues[$kriteria->id]);
                error_log("Nilai Normalisasi: " . $nilai);

                $nilaiNormalisasi[$alternatif->id][$kriteria->id] = $nilai;
                $totalSkor += $nilai * $kriteria->bobot;
                error_log("Total Skor Updated: " . $totalSkor);
            }
            $skor[$alternatif->id] = $totalSkor;
            error_log("Final Skor for Alternatif " . $alternatif->nama . ": " . $totalSkor);
        }

        arsort($skor);
        return view('saw.hasil', compact('skor', 'alternatifs', 'breadcrumb', 'kriterias', 'nilaiNormalisasi'));
    }

    private function calculateNormalizedValue($alternatif, $kriteria, $max_value)
    {
        $nilai = $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? 0;
        
        // Debugging
        error_log("Alternatif: " . $alternatif->nama);
        error_log("Kriteria: " . $kriteria->nama);
        error_log("Nilai: " . $nilai);
        error_log("Max Value: " . $max_value);
        error_log("Jenis Kriteria: " . $kriteria->jenis);

        $result = 0;
        if ($kriteria->jenis == 'Benefit') {
            if ($max_value != 0) {
                $result = $nilai / $max_value;
            } else {
                error_log("Max Value is zero for benefit kriteria: " . $kriteria->nama);
            }
        } else if ($kriteria->jenis == 'Cost') {
            if ($nilai != 0) {
                $result = $max_value / $nilai;
            } else {
                error_log("Nilai is zero for cost kriteria: " . $kriteria->nama);
            }
        } else {
            error_log("Jenis Kriteria tidak dikenal: " . $kriteria->jenis);
        }

        // Debugging
        error_log("Result: " . $result);
        return $result;
    }
}
