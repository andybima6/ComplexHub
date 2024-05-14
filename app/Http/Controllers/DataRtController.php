<?php

namespace App\Http\Controllers;

use App\Models\DataRt;
use Illuminate\Http\Request;

class DataRtController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) ['title' => 'Data RT'];


        $dataRt = DataRt::with(['activities'])->get();
        return view('data_rt.index', compact('dataRt', 'breadcrumb'));
    }

    public function create()
    {
        $breadcrumb = (object) ['title' => 'Tambah Data RT'];
        $dataRt = DataRt::all(); // Misalnya mengambil semua data RT dari model DataRt
        return view('data_rt.create', compact('breadcrumb', 'dataRt'));
    }


    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'periode_awal' => 'required|string|max:255',
            'periode_akhir' => 'required|string|max:255',
        ]);

        // Simpan data RT baru
        $dataRt = DataRt::create($validatedData);

        // Redirect ke halaman index RT setelah berhasil menyimpan
        return redirect()->route('data_rt.index')->with('success', 'Data RT berhasil disimpan');
    }

    public function show(DataRt $dataRt)
    {
        $breadcrumb = (object) ['title' => 'Data RT'];
        return view('data_rt.show', compact('dataRt', 'breadcrumb'));
    }

    public function edit(DataRt $dataRt)
    {
        $breadcrumb = (object) ['title' => 'Edit Data RT'];
        return view('data_rt.edit', compact('dataRt', 'breadcrumb'));
    }

    public function update(Request $request, DataRt $dataRt)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'rt' => 'required|string|max:255',
            'periode_awal' => 'required|string|max:255',
            'periode_akhir' => 'required|string|max:255',
        ]);

        // Perbarui data RT
        $dataRt->update($validatedData);

        // Redirect ke halaman index RT setelah berhasil memperbarui
        return redirect()->route('data_rt.index')->with('success', 'Data RT berhasil diperbarui');
    }

    public function destroy(DataRt $dataRt)
    {
        $breadcrumb = (object) ['title' => 'Hapus Data RT'];
        // Hapus data RT
        $dataRt->delete();

        // Redirect ke halaman index RT setelah berhasil menghapus
        return redirect()->route('data_rt.index')->with('success', 'Data RT berhasil dihapus');
    }
}
