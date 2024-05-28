<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Penilaian;
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
        $penilaians = Penilaian::all(); // Mengambil semua data kegiatan dari model criteria
         $alternatives = Alternative::all();
        return view('metode_dua_spk.penilaian.penilaiandestinasi2', ['breadcrumb' => $breadcrumb], compact('penilaians'));
    }


    public function editPenilaian($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $alternatives = Alternative::all();
        return view('penilaian.edit', compact('penilaian', 'alternatives'));
    }

    // Method to update penilaian
    public function updatePenilaian(Request $request, $id)
    {
        $request->validate([
            'alternative_id' => 'required|exists:alternatives,id',
            'bobot' => 'required|integer|min:1|max:100',
            'biaya_tiket_masuk' => 'required|numeric|min:0',
            'fasilitas' => 'required|numeric|min:0|max:5',
            'kebersihan' => 'required|numeric|min:0|max:5',
            'keamanan' => 'required|numeric|min:0|max:5',
            'biaya_akomodasi' => 'required|numeric|min:0',
        ]);

        $penilaian = Penilaian::findOrFail($id);
        $penilaian->update($request->all());

        return redirect()->route('penilaian.index')->with('success', 'Penilaian updated successfully.');
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
