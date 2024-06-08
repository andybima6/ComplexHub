<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Alternatif (Metode SAW)',
            'subtitle' => '',
        ];
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('alternatifs'),  ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Alternatif (Metode SAW)',
            'subtitle' => '',
        ];

        return view('alternatif.create', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Alternatif::create($request->all());

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function edit(Alternatif $alternatif)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Alternatif',
            'subtitle' => 'Edit Alternatif',
        ];

        return view('alternatif.edit', compact('alternatif'), ['breadcrumb' => $breadcrumb]);
    }

    // public function update(Request $request, Alternatif $alternatif)
    // {
    //     $request->validate([
    //         'nama' => 'required|string|max:255',
    //     ]);

    //     $alternatif->update($request->all());

    //     return redirect()->route('alternatif.index')
    //                      ->with('success', 'Alternatif berhasil diperbarui.');
    // }

    // Contoh di controller
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        // tambahkan validasi lain jika diperlukan
    ]);

    $alternatif = Alternatif::findOrFail($id);
    $alternatif->nama = $request->input('nama');
    $alternatif->save();

    // Set pesan sukses di session
    return redirect()->route('alternatif.index', $id)->with('success', 'Perubahan berhasil disimpan!');
}

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil dihapus.');
    }
}