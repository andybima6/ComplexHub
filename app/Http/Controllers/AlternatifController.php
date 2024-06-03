<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Alternatif (Metode I)',
            'subtitle' => '',
        ];
        $alternatifs = Alternatif::all();
        return view('alternatif.index', compact('alternatifs'),  ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        return view('alternatif.create');
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
        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $alternatif->update($request->all());

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil diperbarui.');
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil dihapus.');
    }
}