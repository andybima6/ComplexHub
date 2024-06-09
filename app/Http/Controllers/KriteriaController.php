<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object)[
            'title' => 'Kriteria (Metode SAW)',
            'subtitle' => '',
        ];

        $query = Kriteria::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        if ($request->has('jenis') && $request->jenis != '') {
            $query->where('jenis', $request->jenis);
        }
        
        $kriterias = $query->get();

        return view('kriteria.index', compact('kriterias', 'breadcrumb'));
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Kriteria (Metode SAW)',
            'subtitle' => '',
        ];
        return view('kriteria.create', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        Kriteria::create($request->all());
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kriteria ',
            'subtitle' => 'Edit Kriteria',
        ];
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('breadcrumb', 'kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
{
    $request->validate([
        'nama' => 'required|string',
        'jenis' => 'required|string',
        'bobot' => 'required|numeric',
    ]);

    $kriteria->update([
        'nama' => $request->nama,
        'jenis' => $request->jenis,
        'bobot' => $request->bobot,
    ]);

    return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
}

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}
