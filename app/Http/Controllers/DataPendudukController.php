<?php

namespace App\Http\Controllers;

use App\Models\DataKk;
use App\Models\DataPenduduk;
use App\Models\DataRt;
use Illuminate\Http\Request;

class DataPendudukController extends Controller
{
    public function index()
    {
        $datapenduduk = DataPenduduk::all();
        return view('datapenduduk.index', compact('datapenduduk'));
    }

    public function create()
{
    // Ambil data RT dan data KK untuk ditampilkan sebagai opsi dalam form
    $dataRtOptions = DataRt::all();
    $dataKkOptions = DataKk::all();

    // Mengembalikan view form pembuatan data penduduk bersama dengan data RT dan KK
    return view('datapenduduk.create', compact('dataRtOptions', 'dataKkOptions'));
}


    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:data_penduduk',
            'rt_id' => 'required',
            'data_kk_id' => 'required',
            'gender' => 'required',
            'usia' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'pekerjaan' => 'required',
        ]);

        // Simpan data penduduk baru ke database
        DataPenduduk::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('datapenduduk.index')->with('success', 'Data penduduk berhasil disimpan.');
    }

    public function show(DataPenduduk $datapenduduk)
    {
        return view('datapenduduk.show', compact('datapenduduk'));
    }

    public function edit(DataPenduduk $datapenduduk)
    {
        // Logika untuk menampilkan form pengeditan data penduduk
    }

    public function update(Request $request, DataPenduduk $datapenduduk)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:data_penduduk,nik,'.$datapenduduk->id,
            'rt_id' => 'required',
            'data_kk_id' => 'required',
            'gender' => 'required',
            'usia' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'agama' => 'required',
            'alamat' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'pekerjaan' => 'required',
        ]);

        // Update data penduduk
        $datapenduduk->update($validatedData);

        // Redirect ke halaman show dengan pesan sukses
        return redirect()->route('datapenduduk.show', $datapenduduk)->with('success', 'Data penduduk berhasil diperbarui.');
    }

    public function destroy(DataPenduduk $datapenduduk)
    {
        // Hapus data penduduk dari database
        $datapenduduk->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('datapenduduk.index')->with('success', 'Data penduduk berhasil dihapus.');
    }
}
