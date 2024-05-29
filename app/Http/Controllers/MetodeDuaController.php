<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\penilaiandua;
use Illuminate\Http\Request;

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
    $penilaians = PenilaianDua::all();
    $alternatives = Alternative::all();
    $criterias = Criteria::all();

    // Persiapkan data untuk normalisasi dan perhitungan skor
    $data = [];
    foreach ($penilaians as $penilaian) {
        $alternative = $alternatives->find($penilaian->alternative_id);
        if ($alternative) {
            $data[] = [
                'alternative' => $alternative->alternatif,
                'bobot' => $penilaian->bobot, // Pastikan 'bobot' ditambahkan
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
    $normalizedData = $this->normalizeData($data, $bobot_kriteria);
    $rankings = $this->calculateRanking($normalizedData, $bobot_kriteria);
    // dd($normalizedData);

    return view('metode_dua_spk.penilaian.penilaiandestinasi2', compact('penilaians', 'breadcrumb', 'normalizedData', 'rankings'));
}


    public function editPenilaian($id)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Penilain (Metode II)',
            'subtitle' => 'Edit Data Penilain',
        ];
        $penilaian = PenilaianDua::findOrFail($id);
        $alternatives = Alternative::all();
        return view('metode_dua_spk.penilaian.penilaian_edit2', compact('penilaian', 'breadcrumb', 'alternatives'));
    }

    // Method to update penilaian
    public function updatePenilaian(Request $request, $id)
    {
        $request->validate([

            'biaya_tiket_masuk' => 'required|numeric|min:0',
            'fasilitas' => 'required|numeric|min:0|max:5',
            'kebersihan' => 'required|numeric|min:0|max:5',
            'keamanan' => 'required|numeric|min:0|max:5',
            'biaya_akomodasi' => 'required|numeric|min:0',
        ]);

        $penilaian = PenilaianDua::findOrFail($id);
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
                'bobot' => $item['bobot'],  // Pastikan 'bobot' ditambahkan
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
