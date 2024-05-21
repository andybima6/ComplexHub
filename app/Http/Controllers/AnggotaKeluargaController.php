<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\DataKartuKeluarga;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function create(DataKartuKeluarga $dataKartuKeluarga)
{
    $dataKartuKeluarga = DataKartuKeluarga::latest()->first();
    
    // Periksa apakah objek $dataKartuKeluarga ada dan memiliki id yang valid`
    if ($dataKartuKeluarga) {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Anggota Keluarga',
        ];
        return view('anggota_keluargas.create', compact('dataKartuKeluarga', 'breadcrumb'));
    } else {
        return redirect()->back()->with('error', 'Tidak ada DataKartuKeluarga yang tersedia.');
    }
}


public function store(Request $request)
{
    $request->validate([
        'kk_id' => 'required', // Pastikan kk_id ada dalam validasi
        'nama' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'hubungan_keluarga' => 'required|string|max:255',
        'status_perkawinan' => 'required|string|in:Menikah,Belum Menikah',
    ]);

    // Menyimpan anggota keluarga dengan menyertakan kk_id
    AnggotaKeluarga::create([
        'kk_id' => $request->kk_id,
        'nama' => $request->nama,
        'nik' => $request->nik,
        'tanggal_lahir' => $request->tanggal_lahir,
        'hubungan_keluarga' => $request->hubungan_keluarga,
        'status_perkawinan' => $request->status_perkawinan,
    ]);

    return redirect()->route('data_kartu_keluargas.show', $request->kk_id)->with('success', 'Anggota Keluarga created successfully.');
}

    public function edit(DataKartuKeluarga $dataKartuKeluarga, AnggotaKeluarga $anggotaKeluarga)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Edit Anggota Keluarga',
        ];
        return view('anggota_keluargas.edit', compact('dataKartuKeluarga', 'anggotaKeluarga', 'breadcrumb'));
    }

    public function update(Request $request, DataKartuKeluarga $dataKartuKeluarga, AnggotaKeluarga $anggotaKeluarga)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'hubungan_keluarga' => 'required|string|max:255',
        ]);

        $anggotaKeluarga->update($request->all());

        return redirect()->route('data_kartu_keluargas.show', $dataKartuKeluarga)->with('success', 'Anggota keluarga berhasil diupdate.');
    }

    public function destroy(DataKartuKeluarga $dataKartuKeluarga, AnggotaKeluarga $anggotaKeluarga)
    {
        $anggotaKeluarga->delete();

        return redirect()->route('data_kartu_keluargas.show', $dataKartuKeluarga)->with('success', 'Anggota keluarga berhasil dihapus.');
    }
}
