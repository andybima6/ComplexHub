<?php

namespace App\Http\Controllers;

use App\Models\suggestion;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function indexRT()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Saran dan Pengaduan',
            'subtitle' => '',
        ];
        $suggestions = suggestion::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('RT.saranRT', ['breadcrumb' => $breadcrumb], compact('suggestions','breadcrumb'));
    }
    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Saran dan Pengaduan',
            'subtitle' => '',
        ];
        $suggestions = suggestion::all(); // Mengambil semua data kegiatan dari model Kegiatan
        return view('RW.saranRW', ['breadcrumb' => $breadcrumb], compact('suggestions','breadcrumb'));
    }
    public function indexPD()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Saran dan Pengaduan',
            'subtitle' => '',
        ];
        $suggestions = suggestion::all(); // Mengambil semua data kegiatan dari model Kegiatan
        return view('Penduduk.saranPD', ['breadcrumb' => $breadcrumb], compact('suggestions','breadcrumb'));
    }

    // public function detailsaranPage()
    // {
    //     $user = auth()->user();

    //     $breadcrumb = (object)[
    //         'title' => 'Saran dan Pengaduan',
    //         'subtitle' => 'Detail Saran dan Pengaduan',
    //     ];
    //     return view('detailSaran', ['breadcrumb' => $breadcrumb]);
    // }

    // public function tanggapanPage()
    // {
    //     // Mendapatkan user yang sedang login
    //     $user = auth()->user();

    //     // Membuat objek breadcrumb
    //     $breadcrumb = (object) [
    //         'title' => 'Saran dan Pengaduan',
    //         'subtitle' => 'Tanggapan',
    //     ];

    //     return view('tanggapan', ['breadcrumb' => $breadcrumb]);
    // }

    public function storeSaran(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tanggal' => 'required|date',
            'field' => 'required|string',
            'laporan' => 'required|string',
            'rt_id' => 'required|exists:data_rt,id',

        ]);
        $suggestions = new suggestion($request->only(['name', 'tanggal','field','laporan', 'rt_id']));

        $suggestions->status = 'pending';
        $suggestions->save();
        return redirect(route('saranPD'));
    }
}
