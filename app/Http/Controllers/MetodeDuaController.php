<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\penilaiandua;
use App\Models\HasilPenilaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


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
            $data[] = [
                'alternative_id' => $penilaian->alternative_id,
                'criteria_id' => $penilaian->criteria_id,
                'tiket' => $penilaian->tiket,
                'fasilitas' => $penilaian->fasilitas,
                'kebersihan' => $penilaian->kebersihan,
                'keamanan' => $penilaian->keamanan,
                'akomodasi' => $penilaian->akomodasi,
            ];
        }

        Log::info('Data sebelum normalisasi:', $data);

        // Lakukan normalisasi dan perhitungan skor
        $normalizedData = $this->normalizeData($data, $criterias); // Kirim data dan kriteria sebagai argumen

        Log::info('Data setelah normalisasi:', $normalizedData);

        // Simpan data yang telah dinormalisasi ke dalam tabel hasil_penilaian
        HasilPenilaian::truncate(); // Hapus data lama
        foreach ($normalizedData as $normalizedItem) {
            HasilPenilaian::create($normalizedItem);
        }

        // Hitung ranking
        $bobot_kriteria = [];
        foreach ($criterias as $criteria) {
            $bobot_kriteria[$criteria->nama_kriteria] = $criteria->bobot;
        }
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

        return view('metode_dua_spk.penilaian.penilaiandestinasi2', compact('penilaians', 'breadcrumb','alternatives','criterias', 'normalizedData', 'rankings'));
    }

    public function editPenilaian($id)
    {
        $penilaian = penilaiandua::findOrFail($id);
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
            'criteria_id' => 'exists:criterias,id',
            'tiket' => 'required|numeric',
            'fasilitas' => 'required|numeric',
            'kebersihan' => 'required|numeric',
            'keamanan' => 'required|numeric',
            'akomodasi' => 'required|numeric',
        ]);

        $penilaian = penilaiandua::findOrFail($id);
        $penilaian->update([
            'alternative_id' => $request->alternative_id,
            'criteria_id' => $request->criteria_id,
            'tiket' => $request->tiket,
            'fasilitas' => $request->fasilitas,
            'kebersihan' => $request->kebersihan,
            'keamanan' => $request->keamanan,
            'akomodasi' => $request->akomodasi,
        ]);

        return redirect()->route('penilaian')->with('success', 'Penilaian berhasil diperbarui');
    }

    private function normalizeData($data, $criterias)
    {
        $maxValues = [];
        $minValues = [];

        foreach ($criterias as $criteria) {
            $kriteria = $criteria->kriteria;
            $values = array_column($data, $kriteria);

            if (!empty($values)) {
                $maxValues[$kriteria] = max($values);
                $minValues[$kriteria] = min($values);
            } else {
                $maxValues[$kriteria] = null;
                $minValues[$kriteria] = null;
            }
        }

        Log::info('Max Values:', $maxValues);
        Log::info('Min Values:', $minValues);

        $normalizedData = [];

        foreach ($data as $item) {
            $normalizedItem = [
                'alternative_id' => $item['alternative_id'],
                'criteria_id' => $item['criteria_id'],
                'tiket' => 1,
                'fasilitas' => 0,
                'kebersihan' => 0,
                'keamanan' => 0,
                'akomodasi' => 1,
            ];

            foreach ($criterias as $criteria) {
                $kriteria = $criteria->kriteria;
                if (isset($item[$kriteria]) && $maxValues[$kriteria] !== null && $minValues[$kriteria] !== null) {
                    if ($criteria->type == 'benefit') {
                        $normalizedItem[$kriteria] = ($item[$kriteria] - $minValues[$kriteria]) / ($maxValues[$kriteria] - $minValues[$kriteria]);
                    } else {
                        $normalizedItem[$kriteria] = ($maxValues[$kriteria] - $item[$kriteria]) / ($maxValues[$kriteria] - $minValues[$kriteria]);
                    }
                }
            }

            Log::info('Normalized Item:', $normalizedItem);

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
