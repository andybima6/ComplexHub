<?php

namespace App\Http\Controllers;

use App\Models\AnggotaKeluarga;
use App\Models\DataKartuKeluarga;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    public function create(DataKartuKeluarga $dataKartuKeluarga)
{
    // $dataKartuKeluarga = DataKartuKeluarga::latest()->first();
    
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
    // dd($request->all());
    $request->validate([
        'kk_id' => 'required', 
        'nama' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'hubungan_keluarga' => 'required|string|in:Ibu,Ayah,Anak',
        'status_perkawinan' => 'required|string|in:Menikah,Belum Menikah',
        'jenis_kelamin' => 'required|string|in:Perempuan,Laki-laki',
        'golongan_darah' => 'required|string|in:A,B,AB,O',
    ]);
    // Menyimpan anggota keluarga dengan menyertakan kk_id
    $anggotaKeluarga = AnggotaKeluarga::create([
        'kk_id' => $request->kk_id,
        'nama' => $request->nama,
        'nik' => $request->nik,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        'hubungan_keluarga' => $request->hubungan_keluarga,
        'status_perkawinan' => $request->status_perkawinan,
        'jenis_kelamin' => $request->jenis_kelamin,
        'golongan_darah' => $request->golongan_darah,
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
            'nik' => 'required|string|size:16',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'hubungan_keluarga' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|in:Menikah,Belum Menikah',
            'jenis_kelamin' => 'required|string|in:Perempuan,Laki-laki',
            'golongan_darah' => 'required|string|in:A,B,AB,O',
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
