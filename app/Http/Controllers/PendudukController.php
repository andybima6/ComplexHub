<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Penduduk'
        ];
    
        $penduduks = Penduduk::all();
    
        return view('penduduks\index', compact('penduduks', 'breadcrumb'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Penduduk'
        ];
        $penduduks = Penduduk::all();
        return view('penduduks\create', compact('penduduks', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        Penduduk::create($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil ditambahkan.');
    }

    public function show(Penduduk $penduduk)
    {
        $breadcrumb = (object) [
            'title' => 'Data Penduduk'
        ];
        return view('penduduks\show', compact('penduduks', 'breadcrumb'));
    }

    public function edit(Penduduk $penduduk)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Data Penduduk'
        ];
        return view('penduduks\]edit', compact('penduduks', 'breadcrumb'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $penduduk->update($request->all());
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil diperbarui.');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil dihapus.');
    }
}
