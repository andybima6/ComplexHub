<?php

namespace App\Http\Controllers;

use App\Models\DataKk;
use App\Models\DataPenduduk;
use Illuminate\Http\Request;

class DataKkController extends Controller
{
    public function index()
    {
        $dataKk = DataKk::all();
        return view('data_kk.index', compact('dataKk'));
    }

    public function create()
    {
        // Menampilkan form pembuatan data KK
        return view('data_kk.create');
    }

    public function store(Request $request)
{
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'kepala_keluarga' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'no_kk' => 'required|string|max:16|unique:data_kk,no_kk',
        'penduduk' => 'required|array|min:1',
        'penduduk.*.nama' => 'required|string|max:255',
        'penduduk.*.nik' => 'required|string|max:16|unique:penduduk,nik',
        'penduduk.*.gender' => 'required|in:Perempuan,Laki-laki',
        'penduduk.*.usia' => 'required|string|max:3',
        'penduduk.*.tmp_lahir' => 'required|string|max:255',
        'penduduk.*.tgl_lahir' => 'required|date',
        'penduduk.*.agama' => 'required|string|in:Islam,Katolik,Protestan,Konghucu,Buddha,Hindu',
        'penduduk.*.alamat' => 'required|string|max:255',
        'penduduk.*.status_pernikahan' => 'required|string|in:Kawin,Belum Kawin,Cerai',
        'penduduk.*.status_keluarga' => 'required|string|in:Kepala Rumah Tangga,Isteri,Anak,Lainnya',
        'penduduk.*.pekerjaan' => 'required|string|max:255',
    ]);

    // Simpan data KK baru
    $dataKk = DataKk::create([
        'kepala_keluarga' => $validatedData['kepala_keluarga'],
        'image' => $request->file('image')->store('images'),
        'no_kk' => $validatedData['no_kk'],
    ]);

    // Simpan data penduduk yang terkait dengan KK baru
    foreach ($validatedData['penduduk'] as $pendudukData) {
        $penduduk = new DataPenduduk($pendudukData);
        $dataKk->penduduk()->save($penduduk);
    }

    // Redirect ke halaman index KK setelah berhasil menyimpan
    return redirect()->route('data_kk.index')->with('success', 'Data KK berhasil disimpan');
}


    public function show(DataKk $dataKk)
    {
        return view('data_kk.show', compact('dataKk'));
    }

    public function edit(DataKk $dataKk)
    {
        // Menampilkan form pengeditan data KK
        return view('data_kk.edit', compact('dataKk'));
    }

    public function update(Request $request, DataKk $dataKk)
{
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'kepala_keluarga' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'no_kk' => 'required|string|max:16|unique:data_kk,no_kk,' . $dataKk->id,
    ]);

    // Perbarui data KK
    $dataKk->update([
        'kepala_keluarga' => $validatedData['kepala_keluarga'],
        'image' => $request->hasFile('image') ? $request->file('image')->store('images') : $dataKk->image,
        'no_kk' => $validatedData['no_kk'],
    ]);

    // Redirect ke halaman index KK setelah berhasil memperbarui
    return redirect()->route('data_kk.index')->with('success', 'Data KK berhasil diperbarui');
}

public function destroy(DataKk $dataKk)
{
    // Hapus data KK
    $dataKk->delete();

    // Redirect ke halaman index KK setelah berhasil menghapus
    return redirect()->route('data_kk.index')->with('success', 'Data KK berhasil dihapus');
}

}
