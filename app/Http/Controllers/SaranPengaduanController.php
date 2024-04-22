<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranPengaduan;

class SaranPengaduanController extends Controller
{
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Ajukan Pengaduan',
        ];
        return view('saran_pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',  
            'jenis' => 'required',
        ]);

        $saranPengaduan = SaranPengaduan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'warga_id' => auth()->user()->id,
        ]);

        return redirect()->route('saran_pengaduan.show', $saranPengaduan)
                         ->with('success', 'Laporan berhasil dikirim.');
    }

    public function show(SaranPengaduan $saranPengaduan)
    {
        
        return view('saran_pengaduan.create', ['pengaduan' => $saranPengaduan]);

    }

    // Fungsi untuk RT/RW memberikan tanggapan
    public function tanggapan(Request $request, SaranPengaduan $saranPengaduan)
    {
        $request->validate([
            'rt_tanggapan' => 'required',
            'rw_tanggapan' => 'required',
        ]);

        $saranPengaduan->update([
            'rt_tanggapan' => $request->rt_tanggapan,
            'rw_tanggapan' => $request->rw_tanggapan,
        ]);

        return redirect()->route('saran_pengaduan.show', $saranPengaduan)
                         ->with('success', 'Tanggapan berhasil disampaikan.');
    }
}