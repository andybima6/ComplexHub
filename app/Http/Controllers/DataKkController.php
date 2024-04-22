<?php

namespace App\Http\Controllers;

use App\Models\dataKk;
use Illuminate\Http\Request;


class DataKkController extends Controller
{
    // Menampilkan semua data KK
    public function index()
    {
        $kks = dataKk::all();
        $breadcrumb = (object) [
            'title' => 'Daftar Data KK'
        ];
        return view('kk.index', compact('kks', 'breadcrumb'));
    }

    // Menampilkan form untuk membuat KK baru
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data KK'
        ];
        return view('kk.create', compact('breadcrumb'));
    }

    // Menyimpan KK baru ke dalam database
    public function store(Request $request)
    {
        // Validasi data yang dikirim oleh user
        $request->validate([
            'kepala_keluarga' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_kk' => 'required|string|max:16',
            'status_ekonomi' => 'required|in:Mampu,Tidak Mampu',
        ]);

        // Mengunggah file gambar
        $imagePath = $request->file('image')->store('kk_images');

        // Membuat objek KK baru
        dataKk::create([
            'kepala_keluarga' => $request->kepala_keluarga,
            'image' => $imagePath,
            'no_kk' => $request->no_kk,
            'status_ekonomi' => $request->status_ekonomi,
        ]);

        return redirect()->route('kk.index')->with('success', 'Data KK berhasil ditambahkan');
    }

    // Menampilkan detail KK
    public function show($id)
    {
        $kk = DataKk::findOrFail($id);
        $breadcrumb = (object) ['title' => 'Detail Data KK', 'route' => 'kk.show', 'id' => $id]; // membuat objek $breadcrumb

    return view('kk.show', compact('kk', 'breadcrumb'));
    }

    // Menampilkan form untuk mengedit KK
    public function edit($id)
    {   
        $kk = DataKk::findOrFail($id);
        $breadcrumb = (object)[
        'title' => 'Edit Data KK',
        'route' => 'kk.edit',
        'id' => $id
    ];

    return view('kk.edit', compact('kk', 'breadcrumb'));
    }

    // Menyimpan perubahan KK ke dalam database
    public function update(Request $request, $id)
    {
        $request->validate([
            'kepala_keluarga' => 'required|string|max:255',
            'no_kk' => 'required|string|max:16',
            'status_ekonomi' => 'required|in:Mampu,Tidak Mampu',
        ]);

        $kk = DataKk::findOrFail($id);

        $kk->update([
            'kepala_keluarga' => $request->kepala_keluarga,
            'no_kk' => $request->no_kk,
            'status_ekonomi' => $request->status_ekonomi,
        ]);

        return redirect()->route('kk.index')->with('success', 'Data KK berhasil diperbarui');
    }

    // Menghapus KK dari database
    public function destroy($id)
    {
        $kk = DataKk::findOrFail($id);
        $kk->delete();

        return redirect()->route('kk.index')->with('success', 'Data KK berhasil dihapus');
    }
}
