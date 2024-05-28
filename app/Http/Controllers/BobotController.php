<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class BobotController extends Controller
{
    public function create(Kriteria $kriteria)
{
    $kriteria = Kriteria::latest()->first();
    
    // Periksa apakah objek $kriteria ada dan memiliki id yang valid`
    if ($kriteria) {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Bobot',
        ];
        return view('anggota_keluargas.create', compact('dataKartuKeluarga', 'breadcrumb'));
    } else {
        return redirect()->back()->with('error', 'Tidak ada DataKartuKeluarga yang tersedia.');
    }
}


public function store(Request $request)
{
    $request->validate([
        'kriteria_id' => 'required', // Pastikan kriteria_id ada dalam validasi
        'bobot' => 'required|integer|max:255',
    ]);

    // Menyimpan bobot dengan menyertakan kriteria_id
    Bobot::create([
        'kriteria_id' => $request->kriteria_id,
        'bobot' => $request->bobot,
    ]);

    return redirect()->route('kriteria.show', $request->kriteria_id)->with('success', 'Bobot berhasil ditambah.');
}

    public function edit(Kriteria $kriteria, Bobot $bobot)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Edit Bobot ',
        ];
        return view('bobot.edit', compact('kriteria', 'bobot', 'breadcrumb'));
    }

    public function update(Request $request, Kriteria $kriteria, Bobot $bobot)
    {
        $request->validate([
            'bobot' => 'required|integer|max:255',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('bobot.show', $kriteria)->with('success', 'Bobot berhasil diupdate.');
    }

    public function destroy(Kriteria $kriteria, Bobot $bobot)
    {
        $bobot->delete();

        return redirect()->route('bobot.show', $kriteria)->with('success', 'Bobot berhasil dihapus.');
    }
}
