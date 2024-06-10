<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IuranWargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Input Iuran',
            'subtitle' => '',
        ];
        return view('warga.index', ['breadcrumb' => $breadcrumb]);
    }

    public function form()
    {
        $breadcrumb = (object) [
            'title' => 'Form Input Iuran',
            'subtitle' => '',
        ];
        $rts = RT::all();
        return view('warga.form', ['breadcrumb' => $breadcrumb],compact('rts'));
    }

    public function history()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'History',
            'subtitle' => '',
        ];
        return view('warga.history', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'periode' => 'required|date',
            'total' => 'required|numeric',
            'keterangan' => 'required|string',
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'rt_id' => 'required|numeric'
        ]);

        // Log the validated data
        Log::info('Validated Data:', $validatedData);

        // Handle file upload
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
        }

        // Save to the database
        Iuran::create([
            'nama' => $request->nama,
            'periode' => $request->periode,
            'total' => $request->total,
            'keterangan' => $request->keterangan,
            'bukti' => $filePath,
            'rt_id' => $request->rt_id
        ]);

        return redirect('/warga/iuran')->with('success', 'Data iuran berhasil disimpan');
    }
}
