<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) ['title' => 'Penilaian', 'subtitle' => 'Metode 1'];

        $penilaian = Penilaian::all();
        return view('penilaian.penilaiandestinasiRW', compact('penilaian'), ['breadcrumb' => $breadcrumb]);
    }

    public function create($nama)
    {
        $nama = 'Fasilitas';
        $penilaian = Penilaian::all(); //mengambil semua data penilaian
        return view('penilaian_create', compact('nama', 'penilaian'));
    }


    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'Jenis' => 'required|string|max:255',
        ]);

        // Simpan Penilaian baru
        $penilaian = Penilaian::create($validatedData);

        // Redirect ke halaman index PenilaiandestinasiRW setelah berhasil menyimpan
        return redirect()->route('penilaian/penilaiandestinasiRW')->with('success', 'Data Penilaian berhasil disimpan');
    }

    public function show(Penilaian $penilaian)
    {
        $breadcrumb = (object) ['title' => 'Data Penilaian'];
        return view('penilaian/show', compact('penilaian', 'breadcrumb'));
    }

    public function edit(Penilaian $penilaian)
    {
        $breadcrumb = (object) ['title' => 'Edit Data Penilaian'];
        return view('/penilaian/edit', compact('penilaian', 'breadcrumb'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
        ]);

        // Perbarui data Penilaian
        $penilaian->update($validatedData);

        // Redirect ke halaman index kriteria setelah berhasil memperbarui
        return redirect()->route('kriteria/kriteriadestinasiRW')->with('success', 'Data Kriteria berhasil diperbarui');
    }

    public function destroy(Penilaian $penilaian)
    {
        $breadcrumb = (object) ['title' => 'Hapus Data Penilaian'];
        // Hapus data penilaian
        $penilaian->delete();

        // Redirect ke halaman index Kriteria setelah berhasil menghapus
        return redirect()->route('penilaian/penilaiandestinasiRW')->with('success', 'Penilaian berhasil dihapus');
    }
}
