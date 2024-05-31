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
            'title' => 'Daftar Penilaian (Metode II)',
            'subtitle' => 'Data Penilaian',
        ];

        // Ambil data penilaian, alternatif, dan kriteria
        $penilaians = Penilaiandua::all();
        $alternatives = Alternative::all();
        $criterias = Criteria::all();

        // Persiapkan data untuk normalisasi dan perhitungan skor
        $data = [];
        foreach ($penilaians as $penilaian) {
            $alternative = $alternatives->find($penilaian->alternative_id);
            if ($alternative) {
                $data[] = [
                    'alternative_id' => $penilaian->alternative_id,
                    'criteria_id' => $penilaian->criteria_id,
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
        foreach ($normalizedData as $normalizedItem) {
            HasilPenilaian::create($normalizedItem);
        }

        // Hitung ranking
        $rankings = $this->calculateRanking($normalizedData, $bobot_kriteria);

        // Simpan ranking ke dalam tabel
        Ranking::truncate(); // Hapus data lama
        foreach ($rankings as $ranking) {
            Ranking::create([
                'alternative_id' => $ranking['alternative_id'],
                'criteria_id' => $ranking['criteria_id'],
                'score' => $ranking['score'],
            ]);
        }

        return view('metode_dua_spk.penilaian.penilaiandestinasi2', compact('penilaians', 'breadcrumb', 'normalizedData', 'rankings'));
    }

    public function editPenilaian($id)
{
    $penilaian = Penilaiandua::findOrFail($id);
    $alternative = Alternative::all();
    $criterias = Criteria::all();

    $breadcrumb = (object)[
        'title' => 'Edit Penilaian',
        'subtitle' => 'Perbarui Data Penilaian',
    ];

    return view('metode_dua_spk.penilaian.penilaian_edit2', compact('penilaian', 'alternative', 'criterias', 'breadcrumb'));
}
public function updatePenilaian(Request $request, $id)
{
    $request->validate([
        'alternative_id' => 'required|exists:alternative,id',
        // 'criteria_id' => 'exists:criterias,id',
        'biaya_tiket_masuk' => 'required|numeric',
        'fasilitas' => 'required|numeric',
        'kebersihan' => 'required|numeric',
        'keamanan' => 'required|numeric',
        'biaya_akomodasi' => 'required|numeric',
    ]);

    $penilaian = Penilaiandua::findOrFail($id);
    $penilaian->update([
        'alternative_id' => $request->alternative_id,
        // 'criteria_id' => $request->criteria_id,
        'biaya_tiket_masuk' => $request->biaya_tiket_masuk,
        'fasilitas' => $request->fasilitas,
        'kebersihan' => $request->kebersihan,
        'keamanan' => $request->keamanan,
        'biaya_akomodasi' => $request->biaya_akomodasi,
    ]);

    return redirect()->route('penilaian')->with('success', 'Penilaian berhasil diperbarui');
}

private function normalizeData($criterias)
{
    // Fetch data from the penilaiandua model
    $data = penilaiandua::all()->toArray();
    $criterias = Criteria::all();

    // Inisialisasi array untuk menyimpan nilai maksimal dan minimal dari setiap kriteria
    $maxValues = [];
    $minValues = [];

    // Iterasi melalui data untuk menemukan nilai maksimal dan minimal dari setiap kriteria
    foreach ($criterias as $criteria) {
        $kriteria = $criteria->kriteria;
        $values = array_column($data, $kriteria);
    
        if (!empty($values)) {
            $maxValues[$kriteria] = max($values);
            $minValues[$kriteria] = min($values);
        } else {
            // Handle the case where there are no values for the current criteria
            $maxValues[$kriteria] = null;
            $minValues[$kriteria] = null;
        }
    }

    // Inisialisasi array untuk menyimpan hasil normalisasi
    $normalizedData = [];

    // Normalisasi data
    foreach ($data as $item) {
        $normalizedItem = [
            'alternative_id' => $item['alternative_id'],
            'criteria_id' => $item['criteria_id'],
            'biaya_tiket_masuk' => 0,  // Default value
            'fasilitas' => 0,          // Default value
            'kebersihan' => 0,         // Default value
            'keamanan' => 0,           // Default value
            'biaya_akomodasi' => 0,    // Default value
        ];

        foreach ($criterias as $criteria) {
            $kriteria = $criteria->kriteria;
            if (isset($item[$kriteria]) && $maxValues[$kriteria] !== null && $minValues[$kriteria] !== null) {
                if ($criteria->type == 'benefit') {
                    // Kriteria benefit: (nilai - nilai minimum) / (nilai maksimum - nilai minimum)
                    $normalizedItem[$kriteria] = ($item[$kriteria] - $minValues[$kriteria]) / ($maxValues[$kriteria] - $minValues[$kriteria]);
                } else {
                    // Kriteria cost: (nilai maksimum - nilai) / (nilai maksimum - nilai minimum)
                    $normalizedItem[$kriteria] = ($maxValues[$kriteria] - $item[$kriteria]) / ($maxValues[$kriteria] - $minValues[$kriteria]);
                }
            }
        }
        $normalizedData[] = $normalizedItem;
    }

    return $normalizedData;
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
                'criteria_id' => $normValues['criteria_id'],
                'score' => $score,
            ];
        }

        // Urutkan berdasarkan skor
        usort($rankings, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return $rankings;
    }
}
