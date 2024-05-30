<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\penilaiandua;
use App\Models\HasilPenilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Log;

class MetodeDuaController extends Controller
{
    public function indexkriteria()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kriteria (Metode II)',
            'subtitle' => 'Data Kriteria',
        ];
        $criterias = Criteria::all(); // Mengambil semua data kegiatan dari model criteria

        return view('metode_dua_spk.kriteria.kriteriadestinasi2', ['breadcrumb' => $breadcrumb], compact('criterias'));
    }
    public function edit($id)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kriteria ',
            'subtitle' => 'Edit Kriteria',
        ];
        $criteria = Criteria::findOrFail($id);
        return view('metode_dua_spk.kriteria.kriteria_edit2', ['breadcrumb' => $breadcrumb], compact('criteria'));
    }

    // Menyimpan perubahan setelah edit

    public function updatekriteria(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:benefit,cost',
            'bobot' => 'required|numeric|min:0',
        ]);

        $criteria = Criteria::findOrFail($id);

        // Hitung total bobot saat ini tanpa kriteria yang sedang diupdate
        $currentTotalBobot = Criteria::where('id', '!=', $id)->sum('bobot');

        // Hitung total bobot baru jika update sukses
        $newTotalBobot = $currentTotalBobot - $criteria->bobot + $request->bobot;

        // Periksa apakah total bobot baru melebihi 1
        if ($newTotalBobot > 1) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['bobot' => 'Total bobot should not exceed 1.']);
        }

        // Lakukan update hanya jika total bobot baru tidak melebihi 1
        $criteria->update([
            'jenis' => $request->jenis,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('kriteria')
            ->with('success', 'Criteria updated successfully');
    }




    // Calculate benefit value

    public function indexAlternatif()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Alternatif (Metode II)',
            'subtitle' => 'Data Alternatif',
        ];
        $alternatives = Alternative::all(); // Mengambil semua data kegiatan dari model criteria

        return view('metode_dua_spk.alternatif.alternatifdestinasi2', ['breadcrumb' => $breadcrumb], compact('alternatives'));
    }

    public function editAlternative($id)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Alternatif ',
            'subtitle' => 'Edit Alternatif',
        ];
        $alternatives = Alternative::findOrFail($id);
        return view('metode_dua_spk.alternatif.alternatif_edit2', ['breadcrumb' => $breadcrumb], compact('alternatives'));
    }

    public function updateAlternative(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'alternatif' => 'required|string|max:255',
        ]);

        // Find the existing alternative or fail
        $alternative = Alternative::findOrFail($id);

        // Update the alternative with the new data
        $alternative->update([
            'alternatif' => $request->input('alternatif'),
        ]);

        // Redirect back to the alternatives list with a success message
        return redirect()->route('alternatif')
            ->with('success', 'Alternative updated successfully');
    }


    public function indexPenilaian()
    {
        $user = auth()->user();
        $breadcrumb = (object)[
            'title' => 'Daftar Penilain (Metode II)',
            'subtitle' => 'Data Penilain',
        ];

        // Ambil data penilaian, alternatif, dan kriteria
        $penilaians = penilaiandua::all();
        $alternatives = Alternative::all();
        $criterias = Criteria::all();

        // Persiapkan data untuk normalisasi dan perhitungan skorP
        $data = [];
        foreach ($penilaians as $penilaian) {
            $alternative = $alternatives->find($penilaian->alternative_id);
            if ($alternative) {
                $data[] = [
                    'alternative_id' => $alternative->id,
                    'bobot' => $penilaian->bobot,
                    'biaya_tiket_masuk' => $penilaian->biaya_tiket_masuk,
                    'fasilitas' => $penilaian->fasilitas,
                    'kebersihan' => $penilaian->kebersihan,
                    'keamanan' => $penilaian->keamanan,
                    'biaya_akomodasi' => $penilaian->biaya_akomodasi,
                ];
            }
        }

        // Persiapkan bobot kriteria
        $bobot_kriteria = [];
        foreach ($criterias as $criteria) {
            $bobot_kriteria[$criteria->nama_kriteria] = $criteria->bobot;
        }

        // Lakukan normalisasi dan perhitungan skor
        $normalizedData = $this->normalizeData($data, $criterias);
        

        // Simpan data yang telah dinormalisasi ke dalam tabel hasil_penilaian
        // foreach ($normalizedData as $normalizedItem) {
        // HasilPenilaian::create($normalizedItem); }
        foreach ($normalizedData as $normalizedItem) {
            // Mengambil alternative_id dari item asli berdasarkan alternative name
            $originalItem = collect($data)->firstWhere('alternative_id', $normalizedItem['alternative_id']);
            if ($originalItem) {
                $normalizedItem['alternative_id'] = $originalItem['alternative_id'];
                // Menghapus alternative name karena tidak dibutuhkan dalam tabel hasil_penilaian
                unset($normalizedItem['alternative']);
                HasilPenilaian::create($normalizedItem);
            }
        
        $rankings = $this->calculateRanking($normalizedData, $bobot_kriteria);
            foreach ($rankings as $ranking) {
                $alternative = Alternative::where('alternatif', $ranking['alternative'])->first();
                if ($alternative) {
                    Ranking::create([
                        'alternative_id' => $alternative->id,
                        'score' => $ranking['score'],
                    ]);
                } else {
                    // Tangani kasus di mana alternative tidak ditemukan (misalnya, log error atau lempar exception)
                    Log::error('Alternative not found: ' . $ranking['alternative']);
                }
            }
    }

        return view('metode_dua_spk.penilaian.penilaiandestinasi2', compact('penilaians', 'breadcrumb', 'normalizedData', 'rankings'));
    }

    public function editPenilaian($id)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Penilain (Metode II)',
            'subtitle' => 'Edit Data Penilain',
        ];
        $penilaian = penilaiandua::findOrFail($id);
        $alternatives = Alternative::all();
        return view('metode_dua_spk.penilaian.penilaian_edit2', compact('penilaian', 'breadcrumb', 'alternatives'));
    }

    public function updatePenilaian(Request $request, $id)
    {
        $request->validate([
            'biaya_tiket_masuk' => 'required|numeric|min:0',
            'fasilitas' => 'required|numeric|min:0|max:5',
            'kebersihan' => 'required|numeric|min:0|max:5',
            'keamanan' => 'required|numeric|min:0|max:5',
            'biaya_akomodasi' => 'required|numeric|min:0',
        ]);

        $penilaian = penilaiandua::findOrFail($id);
        $penilaian->update($request->all());

        return redirect()->route('penilaian')->with('success', 'Penilaian updated successfully.');
    }

    public function olahPenilaian(Request $request, $id)
    {
        return redirect()->route('penilaian')->with('success', 'Penilaian updated successfully.');
    }

    public function indexRanking()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Ranking (Metode II)',
            'subtitle' => 'Data Ranking',
        ];

        // Ambil data penilaian
        $penilaians = penilaiandua::with('alternative')->get();

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
                'alternative_id' => $normValues['alternative_id'],
                'score' => $score,
            ];
        }

        // Urutkan berdasarkan skor
        usort($rankings, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Simpan ranking ke database
        Ranking::truncate();
        foreach ($rankings as $ranking) {
            Ranking::create([
                'alternative_id' => Alternative::where('alternatif', $ranking['alternative_id']),
                'score' => $ranking['score'],
            ]);
        }

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

    public function normalizeData($data, $criterias)
    {
        // Inisialisasi array untuk menyimpan nilai maksimal dan minimal dari setiap kriteria
        $maxValues = [];
        $minValues = [];
    
        // Iterasi melalui data untuk menemukan nilai maksimal dan minimal dari setiap kriteria
        foreach ($criterias as $criteria) {
            $criterion = $criteria->criterion;
            $values = array_column($data, $criterion);
            $maxValues[$criterion] = max($values);
            $minValues[$criterion] = min($values);
        }
    
        // Inisialisasi array untuk menyimpan hasil normalisasi
        $normalizedData = [];
    
        // Normalisasi data
        foreach ($data as $item) {
            $normalizedItem = ['alternative_id' => $item['alternative_id']];
    
            foreach ($criterias as $criteria) {
                $criterion = $criteria->criterion;
                if (isset($item[$criterion])) {
                    if ($criteria->type == 'benefit') {
                        // Kriteria benefit: (nilai - nilai minimum) / (nilai maksimum - nilai minimum)
                        $normalizedItem[$criterion] = ($item[$criterion] - $minValues[$criterion]) / ($maxValues[$criterion] - $minValues[$criterion]);
                    } else {
                        // Kriteria cost: (nilai maksimum - nilai) / (nilai maksimum - nilai minimum)
                        $normalizedItem[$criterion] = ($maxValues[$criterion] - $item[$criterion]) / ($maxValues[$criterion] - $minValues[$criterion]);
                    }
                } else {
                    $normalizedItem[$criterion] = 0; // Atau nilai default lainnya jika kunci tidak ditemukan
                }
            }
            $normalizedItem['alternative_id'] = $item['alternative_id']; // Tambahkan nama alternatif
            $normalizedData[] = $normalizedItem;
        }
    
        return $normalizedData;
    }
}
