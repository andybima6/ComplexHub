<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) ['title' => 'Data Alternatif', 'subtitle' => ''];

        $alternatif = Alternatif::all();
        return view('Destinasi.alternatifdestinasiRW', compact('alternatif'), ['breadcrumb' => $breadcrumb]);
    }

    public function create($namawisata)
    {
        $namawisata = 'Kayutangan Heritage';
        $alternatif = Alternatif::all(); //mengambil semua data alternatif
        return view('alternatif_create', compact('nama', 'kriteria'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama wisata' => 'required|string|max:255',
        ]);

        // Simpan Alternatif baru
        $alternatif = Alternatif::create($validatedData);

        // Redirect ke halaman index alternatifdestinasiRW setelah berhasil menyimpan
        return redirect()->route('Destinasi/alternatifdestinasiRW')->with('success', 'Data Alternatif berhasil disimpan');
    }

    public function show(Alternatif $alternatif)
    {
        $breadcrumb = (object) ['title' => 'Data Alternatif'];
        return view('alternatif/show', compact('alternatif', 'breadcrumb'));
    }

    public function edit(Alternatif $alternatif)
    {
        $breadcrumb = (object) ['title' => 'Edit Data Alternatif'];
        return view('/alternatif/edit', compact('alternatif', 'breadcrumb'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama wisata' => 'required|string|max:255',
        ]);

        // Perbarui data alternatif
        $alternatif->update($validatedData);

        // Redirect ke halaman index kriteria setelah berhasil memperbarui
        return redirect()->route('Destinasi/alternatifdestinasiRW')->with('success', 'Data alternatif berhasil diperbarui');
    }

    public function destroy(Alternatif $alternatif)
    {
        $breadcrumb = (object) ['title' => 'Hapus Data Alterntaif'];
        // Hapus data Alternatif
        $alternatif->delete();

        // Redirect ke halaman index Alternatif setelah berhasil menghapus
        return redirect()->route('Destinasi/alternatifdestinasiRW')->with('success', 'Data Alternatif berhasil dihapus');
    }
}
