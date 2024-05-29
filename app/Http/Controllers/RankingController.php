<?php

namespace App\Http\Controllers;

use App\Models\PenilaianDua;
use App\Models\Criteria;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function indexRanking()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Ranking (Metode II)',
            'subtitle' => 'Data Ranking',
        ];

        // Ambil data penilaian
        $penilaians = PenilaianDua::with('alternative')->get();

        // Ambil data kriteria
        $criterias = Criteria::all();

        // Persiapkan data untuk normalisasi dan perhitungan skor
        $data = [];
        foreach ($penilaians as $penilaian) {
            $data[] = [
                'alternative' => $penilaian->alternative->alternatif,
                'bobot' => $penilaian->bobot,
                'biaya_tiket_masuk' => $penilaian->biaya_tiket_masuk,
                'kebersihan' => $penilaian->kebersihan,
                'fasilitas' => $penilaian->fasilitas,
                'keamanan' => $penilaian->keamanan,
                'biaya_akomodasi' => $penilaian->biaya_akomodasi,
            ];
        }

        // Persiapkan bobot kriteria
        $bobot_kriteria = [];
        foreach ($criterias as $criteria) {
            $bobot_kriteria[$criteria->nama_kriteria] = $criteria->bobot;
        }

        // Lakukan normalisasi dan perhitungan skor
        $normalizedData = $this->normalizeData($data, $bobot_kriteria);
        $rankings = $this->calculateRanking($normalizedData, $bobot_kriteria);

        return view('metode_dua_spk.rankingdestinasi2', compact('rankings', 'breadcrumb'));
    }

    private function calculateRanking($normalizedData, $bobot_kriteria)
    {
        // Hitung skor
        $rankings = [];
        foreach ($normalizedData as $normValues) {
            $score = 0;
            foreach ($bobot_kriteria as $key => $bobot) {
                if (isset($normValues[$key])) {
                    $score += $normValues[$key] * $bobot;
                }
            }
            $rankings[] = [
                'alternative' => $normValues['alternative'],
                'score' => $score,
            ];
        }

        // Urutkan berdasarkan skor
        usort($rankings, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return $rankings;
    }

    public function getMaxMinValues($data)
    {
        $maxMinValues = ['max' => [], 'min' => []];

        foreach ($data as $item) {
            foreach ($item as $key => $value) {
                if (is_numeric($value)) {
                    if (!isset($maxMinValues['max'][$key]) || $value > $maxMinValues['max'][$key]) {
                        $maxMinValues['max'][$key] = $value;
                    }
                    if (!isset($maxMinValues['min'][$key]) || $value < $maxMinValues['min'][$key]) {
                        $maxMinValues['min'][$key] = $value;
                    }
                }
            }
        }

        return $maxMinValues;
    }

    public function normalizeData($data, $bobot_kriteria)
    {
        $normalized = [];
        $maxMinValues = $this->getMaxMinValues($data);

        foreach ($data as $item) {
            $normalizedItem = [
                'alternative' => $item['alternative'],
                'bobot' => $item['bobot'],
            ];
            foreach ($bobot_kriteria as $key => $bobot) {
                if (isset($item[$key])) {
                    if ($key == 'biaya_tiket_masuk' || $key == 'biaya_akomodasi') {
                        // Cost criteria
                        $normalizedItem[$key] = $item[$key] > 0 ? $maxMinValues['min'][$key] / $item[$key] : 0;
                    } else {
                        // Benefit criteria
                        $normalizedItem[$key] = $maxMinValues['max'][$key] > 0 ? $item[$key] / $maxMinValues['max'][$key] : 0;
                    }
                } else {
                    // Handle case when key does not exist
                    $normalizedItem[$key] = 0; // Default value if key does not exist
                }
            }
            $normalized[] = $normalizedItem;
        }

        return $normalized;
    }
}
