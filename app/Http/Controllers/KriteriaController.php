<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Kriteria (Metode I)',
            'subtitle' => '',
        ];

        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'), ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        Kriteria::create($request->all());
        return redirect()->route('kriteria.index');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $kriteria->update($request->all());
        return redirect()->route('kriteria.index');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index');
    }
}