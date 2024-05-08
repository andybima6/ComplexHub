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

    public function ShowPenduduk($id)
    {
        $breadcrumb = (object)[
            'title' => 'Saran Pengaduan',
            'subtitle' => 'Detail Pengaduan',
        ];

        // $suggestion = Activity::where()
        $suggestion = suggestion::findOrFail($id);
        return view('Penduduk.detailSaranPD', compact('suggestion', 'breadcrumb'));
    }
    public function updateSaranPD(Request $request)
    {
        $request->validate([

            'name' => 'required|string',
            'tanggal' => 'required|date',
            'field' => 'required|string',
            'laporan' => 'required|string',
            'rt_id' => 'required|exists:data_rt,id',
            'id' => 'required|exists:suggestions',
        ]);

        $suggestion = suggestion::findOrFail($request->post('id'));


        $suggestion->tanggal = $request->tanggal;
        $suggestion->name = $request->name;
        $suggestion->field = $request->field;
        $suggestion->laporan = $request->laporan;
        $suggestion->rt_id = $request->rt_id;
        $suggestion->save();

        return redirect(route('saranPD'));
    }
    public function deleteSaranPD(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:suggestions',
        ]);

        $suggestion = suggestion::findOrFail($request->id);

        $suggestion->delete();

        return response()->json([
            'success' => true,
        ]);
    }


    public function rejectSaranRW($id)
    {
        $suggestion = suggestion::find($id);

        if (!$suggestion) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $suggestion->status = 'rejected';
        $suggestion->save();

        return redirect(route('saranRW'));

    }

    public function accSaranRW($id)
    {
        $suggestion = suggestion::find($id);

        if (!$suggestion) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $suggestion->status = 'accepted';
        $suggestion->save();

        return redirect(route('saranRW'));

    }
    public function rejectSaranRT($id)
    {
        $suggestion = suggestion::find($id);

        if (!$suggestion) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $suggestion->status = 'rejected';
        $suggestion->save();

        return redirect(route('saranRT'));

    }

    public function accSaranRT($id)
    {
        $suggestion = suggestion::find($id);

        if (!$suggestion) {
            return response()->json([
                'success' => false,
                'message' => 'Kegiatan tidak ditemukan.'
            ], 404);
        }

        $suggestion->status = 'accepted';
        $suggestion->save();

        return redirect(route('saranRT'));

    }
}
