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
        $penilaians = PenilaianDua::with('criteria')->get();
        $alternatives = PenilaianDua::with('alternative')->get();

        return view('metode_dua_spk.penilaian.penilaiandestinasi2', compact('penilaians', 'breadcrumb', 'alternatives'));
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
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Ranking (Metode II)',
            'subtitle' => 'Data Ranking',
        ];
        $criterias = Criteria::all(); // Mengambil semua data kegiatan dari model criteria

        return view('metode_dua_spk.rankingdestinasi2', ['breadcrumb' => $breadcrumb], compact('criterias'));
    }
}
