<?php

namespace App\Http\Controllers;

use App\Models\RT;
use Illuminate\Http\Request;

class RTController extends Controller
{
    public function index(Request $request)
{
    $breadcrumb = (object)[
        'title' => 'Pendataan',
        'subtitle' => 'List Data RT',
    ];

    $search = $request->input('search');
    if ($search) {
        $rts = RT::where('nama', 'like', "%{$search}%")
                 ->orWhere('rt', 'like', "%{$search}%")
                 ->orWhere('alamat', 'like', "%{$search}%")
                 ->orWhere('nomor_telefon', 'like', "%{$search}%")
                 ->get();
    } else {
        $rts = RT::all();
    }

    return view('rts.index', compact('rts', 'breadcrumb', 'search'));
}

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Tambah Data RT',
        ];
        return view('rts.create', compact('breadcrumb'));
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

        RT::create($request->all());
        $rtName = $request->nama;
        return redirect()->route('rts.index')->with('success', "RT \"$rtName\" created successfully.");
}

    public function show(RT $rt)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Detail Data RT',
        ];
        return view('rts.show', compact('rt', 'breadcrumb'));
    }

    public function edit(RT $rt)
    {
        $breadcrumb = (object)[
            'title' => 'Pendataan',
            'subtitle' => 'Edit Data RT',
        ];
        return view('rts.edit', compact('rt', 'breadcrumb'));
    }

    public function update(Request $request, RT $rt)
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

        $rt->update($request->all());
        $rtName = $request->nama;
        return redirect()->route('rts.index')->with('success', "RT \"$rtName\" updated successfully.");
    }

    public function destroy(RT $rt)
    {
        $rt->delete();
        return redirect()->route('rts.index')->with('success', 'RT deleted successfully.');
    }
}
