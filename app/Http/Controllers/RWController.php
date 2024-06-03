<?php

namespace App\Http\Controllers;


use App\Models\RW;
use Illuminate\Http\Request;

class RWController extends Controller
{
    public function index(Request $request)
{
    $breadcrumb = (object)[
        'title' => 'Pendataan',
        'subtitle' => 'List Data RT',
    ];

    $search = $request->input('search');
    if ($search) {
        $rws = RW::where('nama', 'like', "%{$search}%")
                 ->orWhere('rt', 'like', "%{$search}%")
                 ->orWhere('alamat', 'like', "%{$search}%")
                 ->orWhere('nomor_telefon', 'like', "%{$search}%")
                 ->get();
    } else {
        $rws = RW::all();
    }

    return view('rws.index', compact('rws', 'breadcrumb', 'search'));
}

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Data RT',
        ];
        return view('rws.create', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
            'alamat' => 'required',
            'nomor_telefon' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi.',
            'rt.required' => 'Nomor RT harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'nomor_telefon.required' => 'Nomor telepon harus diisi.'
        ]);

        RW::create($request->all());
        $rtName = $request->nama;
        return redirect()->route('rws.index')->with('success', "RW \"$rtName\" created successfully.");
}

    public function show(RW $rw)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Detail Data RT',
        ];
        return view('rws.show', compact('rw', 'breadcrumb'));
    }

    public function edit(RW $rW)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Edit Data RT',
        ];
        return view('rws.edit', compact('rw', 'breadcrumb'));
    }

    public function update(Request $request, RW $rw)
    {
        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
            'alamat' => 'required',
            'nomor_telefon' => 'required'
        ], [
            'nama.required' => 'Nama harus diisi.',
            'rt.required' => 'Nomor RT harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'nomor_telefon.required' => 'Nomor telepon harus diisi.'
        ]);

        $rw->update($request->all());
        $rwName = $request->nama;
        return redirect()->route('rws.index')->with('success', "RW \"$rwName\" updated successfully.");
    }

    public function destroy(RW $rw)
    {
        $rw->delete();
        return redirect()->route('rws.index')->with('success', 'RW deleted successfully.');
    }
}
