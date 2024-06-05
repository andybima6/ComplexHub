<?php

namespace App\Http\Controllers;

use App\Models\DataKartuKeluarga;
use App\Models\RT;
use Illuminate\Http\Request;

class DataKartuKeluargaController extends Controller
{
    public function index(Request $request)
{
    $rts = RT::all();
    $breadcrumb = (object)[
            'title' => 'Data',
            'subtitle' => 'Kartu Keluarga',
    ];

    $search = $request->input('search');
    $data_kartu_keluargas = DataKartuKeluarga::with('rt')->when($search, function ($query, $search) {
        return $query->where('kepala_keluarga', 'like', "%{$search}%")
                     ->orWhere('no_kk', 'like', "%{$search}%")
                     ->orWhere('alamat', 'like', "%{$search}%");
    })->get();

    return view('data_kartu_keluargas.index', compact('data_kartu_keluargas', 'breadcrumb', 'search', 'rts'));
}

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Data KK',
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
            'foto_kartu_keluarga' => 'required|image',
            'alamat' => 'required',
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
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('data_kartu_keluargas.index')->with('success', 'Data Kartu Keluarga created successfully.');
    }

    public function show(DataKartuKeluarga $dataKartuKeluarga)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Detail',
        ];

        $anggotaKeluargas = $dataKartuKeluarga->anggotaKeluargas;

        return view('data_kartu_keluargas.show', compact('dataKartuKeluarga', 'breadcrumb', 'anggotaKeluargas'));
    }

    public function edit(DataKartuKeluarga $dataKartuKeluarga)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Edit',
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
            'status_ekonomi' => 'required',
            'alamat' => 'required',
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
            'alamat' => $request->alamat,
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

    $dataKartuKeluarga->anggotaKeluargas()->create([
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

    return redirect()->route('data_kartu_keluargas.show', $dataKartuKeluarga->id)->with('success', 'Anggota keluarga berhasil ditambahkan.');
}

}
