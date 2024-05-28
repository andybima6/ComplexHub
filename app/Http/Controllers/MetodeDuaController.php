<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
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
    public function updatecriteria(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:benefit,cost',
            'bobot' => 'required|numeric',
        ]);

        $criteria = Criteria::findOrFail($id);
        $criteria->update($request->only('jenis', 'bobot'));

        return redirect()->route('kriteria')
            ->with('success', 'Criteria updated successfully');
    }

    public function updatejenis(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:benefit,cost',
            'bobot' => 'required|numeric',
        ]);

        $criteria = Criteria::findOrFail($id);

        // Apply different calculations based on 'jenis'
        if ($request->jenis == 'benefit') {
            $calculatedValue = $this->calculateBenefit($request->bobot);
        } else {
            $calculatedValue = $this->calculateCost($request->bobot);
        }

        // Update criteria with calculated value
        $criteria->update([
            'jenis' => $request->jenis,
            'bobot' => $calculatedValue,
        ]);

        return redirect()->route('criterias.index')
            ->with('success', 'Criteria updated successfully');
    }

    // Calculate benefit value
    private function calculateBenefit($bobot)
    {
        // Example formula for benefit
        return $bobot * 1.1;
    }

    // Calculate cost value
    private function calculateCost($bobot)
    {
        // Example formula for cost
        return $bobot * 0.9;
    }



    public function indexAlternatif()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Alternatif (Metode II)',
            'subtitle' => 'Data Alternatif',
        ];
        $criterias = Criteria::all(); // Mengambil semua data kegiatan dari model criteria

        return view('metode_dua_spk.alternatifdestinasi2', ['breadcrumb' => $breadcrumb], compact('criterias'));
    }


    public function indexPenilaian()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Penilain (Metode II)',
            'subtitle' => 'Data Penilain',
        ];
        $criterias = Criteria::all(); // Mengambil semua data kegiatan dari model criteria

        return view('metode_dua_spk.penilaiandestinasi2', ['breadcrumb' => $breadcrumb], compact('criterias'));
    }
    public function indexRanking()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Ranking (Metode II)',
            'subtitle' => 'Data Ranking',
        ];
        $criterias = Criteria::all(); // Mengambil semua data kegiatan dari model criteria

        return view('metode_dua_spk.rankingdestinasi2', ['breadcrumb' => $breadcrumb], compact('criterias'));
    }
}
