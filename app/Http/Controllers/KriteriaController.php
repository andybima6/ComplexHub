<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Kriteria (Metode SAW)',
            'subtitle' => '',
        ];

        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'), ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Kriteria (Metode SAW)',
            'subtitle' => '',
        ];
        return view('kriteria.create', ['breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        Kriteria::create($request->all());
        return redirect()->route('kriteria.index');
    }

    public function edit($id)
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kriteria ',
            'subtitle' => 'Edit Kriteria',
        ];
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', ['breadcrumb' => $breadcrumb], compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
{
    $request->validate([
        'nama' => 'required|string',
        'jenis' => 'required|string',
        'bobot' => 'required|numeric',
    ]);

    $kriteria->update($request->all());
    
    return redirect()->route('kriteria.edit', $kriteria->id)->with('success', 'Kriteria berhasil diperbarui.');
}



    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index');
    }
}