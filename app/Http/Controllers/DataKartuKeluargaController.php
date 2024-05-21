<?php

namespace App\Http\Controllers;

use App\Models\DataKartuKeluarga;
use App\Models\RT;
use Illuminate\Http\Request;

class DataKartuKeluargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'List Data Kartu Keluarga',
        ];
        $data_kartu_keluargas = DataKartuKeluarga::all();
        return view('data_kartu_keluargas.index', compact('data_kartu_keluargas', 'breadcrumb'));
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Data Kartu Keluarga',
        ];
        $rts = RT::all();
        return view('data_kartu_keluargas.create', compact('rts', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'rt_id' => 'required',
            'status_ekonomi' => 'required',
            'foto_kartu_keluarga' => 'required|image'
        ]);

        $imageName = null;
        if ($request->hasFile('foto_kartu_keluarga')) {
            $image = $request->file('foto_kartu_keluarga');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        DataKartuKeluarga::create([
            'kepala_keluarga' => $request->kepala_keluarga,
            'no_kk' => $request->no_kk,
            'rt_id' => $request->rt_id,
            'status_ekonomi' => $request->status_ekonomi,
            'foto_kartu_keluarga' => $imageName,
        ]);

        return redirect()->route('data_kartu_keluargas.index')->with('success', 'Data Kartu Keluarga created successfully.');
    }

    public function show(DataKartuKeluarga $dataKartuKeluarga)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Detail Data Kartu Keluarga',
        ];

        $anggotaKeluargas = $dataKartuKeluarga->anggotaKeluargas;

        return view('data_kartu_keluargas.show', compact('dataKartuKeluarga', 'breadcrumb', 'anggotaKeluargas'));
    }

    public function edit(DataKartuKeluarga $dataKartuKeluarga)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Edit Data Kartu Keluarga',
        ];
        $rts = RT::all();
        return view('data_kartu_keluargas.edit', compact('dataKartuKeluarga', 'rts', 'breadcrumb'));
    }

    public function update(Request $request, DataKartuKeluarga $dataKartuKeluarga)
    {
        $request->validate([
            'kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'rt_id' => 'required',
            'status_ekonomi' => 'required'
        ]);

        $imageName = $dataKartuKeluarga->foto_kartu_keluarga;
        if ($request->hasFile('foto_kartu_keluarga')) {
            $image = $request->file('foto_kartu_keluarga');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        $dataKartuKeluarga->update([
            'kepala_keluarga' => $request->kepala_keluarga,
            'no_kk' => $request->no_kk,
            'rt_id' => $request->rt_id,
            'status_ekonomi' => $request->status_ekonomi,
            'foto_kartu_keluarga' => $imageName,
        ]);

        return redirect()->route('data_kartu_keluargas.index')->with('success', 'Data Kartu Keluarga updated successfully.');
    }

    public function destroy(DataKartuKeluarga $dataKartuKeluarga)
    {
        if ($dataKartuKeluarga->foto_kartu_keluarga) {
            unlink(public_path('images/' . $dataKartuKeluarga->foto_kartu_keluarga));
        }
        $dataKartuKeluarga->delete();
        return redirect()->route('data_kartu_keluargas.index')->with('success', 'Data Kartu Keluarga deleted successfully.');
    }

    public function createAnggota(DataKartuKeluarga $dataKartuKeluarga)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Anggota Keluarga',
        ];
        return view('anggota_keluargas.create', compact('dataKartuKeluarga', 'breadcrumb'));
    }

    public function storeAnggota(Request $request, DataKartuKeluarga $dataKartuKeluarga)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'hubungan_keluarga' => 'required|string|max:255',
            'status_perkawinan' => 'required|string|in:Menikah,Belum Menikah', // Menambahkan validasi status perkawinan
        ]);

        $dataKartuKeluarga->anggotaKeluargas()->create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hubungan_keluarga' => $request->hubungan_keluarga,
            'status_perkawinan' => $request->status_perkawinan, // Menambahkan status perkawinan
            'kk_id' => $dataKartuKeluarga->id,
        ]);

        return redirect()->route('data_kartu_keluargas.show', $dataKartuKeluarga)->with('success', 'Anggota keluarga berhasil ditambahkan.');
    }
}
