<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan; // Import model Kegiatan
use Illuminate\Support\Facades\Gate;

class KegiatanController extends Controller
{
    public function indexRT()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        $kegiatans = Kegiatan::all(); // Mengambil semua data kegiatan dari model Kegiatan

        return view('RT.usulanKegiatanRT', ['breadcrumb' => $breadcrumb], compact('kegiatans'));
    }

    // Metode lainnya...


    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        return view('RW.usulanKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexPenduduk()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
            'subtitle' => '',
        ];
        return view('Penduduk.usulanKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinRT()
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('RT.detailKegiatanRT', ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailIzinRW()
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('RW.detailKegiatanRW', ['breadcrumb' => $breadcrumb]);
    }
    public function indexDetailIzinPenduduk()
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('Penduduk.detailKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }
    public function indexTambahIzinPenduduk()
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => '',
        ];

        return view('Penduduk.tambahKegiatanPD', ['breadcrumb' => $breadcrumb]);
    }
    public function rejectKegiatan(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string|max:255',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->status = 'rejected';
        $kegiatan->comment = $request->alasan;
        $kegiatan->save();

        // Redirect or return response as needed
    }
    public function acceptKegiatan(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->status = 'accepted';
        $kegiatan->save();

        // Redirect or return response as needed
    }
}
