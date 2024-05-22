<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) ['title' => 'Data Kriteria', 'subtitle' => ''];

        $kriteria = Kriteria::all();
        return view('kriteria.kriteriadestinasiRW', compact('kriteria'), ['breadcrumb' => $breadcrumb]);
    }

    public function create($nama)
    {
        $nama = 'Fasilitas';
        $kriteria = Kriteria::all(); //mengambil semua data kriteria
        return view('kriteria_create', compact('nama', 'kriteria'));
    }


    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'Jenis' => 'required|string|max:255',
        ]);

        // Simpan Kriteria baru
        $Kriteria = Kriteria::create($validatedData);

        // Redirect ke halaman index KriteriadestinasiRW setelah berhasil menyimpan
        return redirect()->route('kriteria/kriteriadestinasiRW')->with('success', 'Data Kriteria berhasil disimpan');
    }

    public function show(Kriteria $kriteria)
    {
        $breadcrumb = (object) ['title' => 'Data Kriteria'];
        return view('kriteria/show', compact('kriteria', 'breadcrumb'));
    }

    public function edit(Kriteria $kriteria)
    {
        $breadcrumb = (object) ['title' => 'Edit Data Kriteria'];
        return view('/kriteria/edit', compact('kriteria', 'breadcrumb'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
        ]);

        // Perbarui data Kriteria
        $kriteria->update($validatedData);

        // Redirect ke halaman index kriteria setelah berhasil memperbarui
        return redirect()->route('kriteria/kriteriadestinasiRW')->with('success', 'Data Kriteria berhasil diperbarui');
    }

    public function destroy(Kriteria $kriteria)
    {
        $breadcrumb = (object) ['title' => 'Hapus Data Kriteria'];
        // Hapus data Kriteria
        $kriteria->delete();

        // Redirect ke halaman index Kriteria setelah berhasil menghapus
        return redirect()->route('kriteria/kriteriadestinasiRW')->with('success', 'Data Kriteria berhasil dihapus');
    }
}
