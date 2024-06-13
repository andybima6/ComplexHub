<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function indexRT()
    {
        // Mendapatkan rt_id pengguna yang sedang login
        $rt_id = auth()->user()->rt_id;

        $breadcrumb = (object)[
            'title' => 'Saran dan Pengaduan',
            'subtitle' => '',
        ];

        // Mengambil data pengaduan berdasarkan rt_id pengguna
        $suggestions = Suggestion::where('rt_id', $rt_id)->get();

        // Mengambil data RT yang sesuai dengan rt_id pengguna
        $rts = RT::where('id', $rt_id)->get();

        return view('RT.saranRT', compact('suggestions', 'breadcrumb', 'rts'));
    }

    public function indexRW()
    {
        $user = auth()->user();

        $breadcrumb = (object)[
            'title' => 'Saran dan Pengaduan',
            'subtitle' => '',
        ];
        $suggestions = Suggestion::all(); // Mengambil semua data kegiatan dari model Kegiatan
        $rts = RT::all();
        return view('RW.saranRW', ['breadcrumb' => $breadcrumb], compact('suggestions','breadcrumb','rts'));
    }
    public function indexPD()
    {
        $user = auth()->user();
        $userId = $user->id;
        $breadcrumb = (object)[
            'title' => 'Saran dan Pengaduan',
            'subtitle' => '',
        ];

        $suggestions = Suggestion::where('user_id', $userId)->get();
        $rts = RT::all(); // Assuming you have a model named RT and you want to fetch all RT records

        return view('Penduduk.saranPD', ['breadcrumb' => $breadcrumb], compact('suggestions', 'breadcrumb', 'rts','user'));
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
        // Validasi input pengguna
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'user_id' => 'required|int',
            'name' => 'required|string|max:255',
            'field' => 'required|string|max:255',
            'laporan' => 'required|string',
            'rt_id' => 'required|exists:rts,id',
        ]);

        // Pastikan data hanya masuk ke rt_id yang sesuai
        $rtId = $request->input('rt_id');
        if (RT::where('id', $rtId)->exists()) {
            Suggestion::create($validated);
            return redirect()->back()->with('success', 'Suggestion added successfully.');
        }

        return redirect()->back()->with('error', 'Invalid rt_id. Suggestion not added.');
    }

    public function ShowPenduduk($id)
    {
        $breadcrumb = (object)[
            'title' => 'Saran Pengaduan',
            'subtitle' => 'Detail Pengaduan',
        ];
        // $suggestion = Activity::where()
        $suggestion = Suggestion::findOrFail($id);
        return view('Penduduk.detailSaranPD', compact('suggestion', 'breadcrumb'));
    }
    public function updateSaranPD(Request $request)
    {
        $request->validate([

            'name' => 'required|string',
            'user_id' => 'required|int',
            'tanggal' => 'required|date',
            'field' => 'required|string',
            'laporan' => 'required|string',
            'rt_id' => 'required|exists:rts,id',
            'id' => 'required|exists:suggestions',
        ]);

        $suggestion = Suggestion::findOrFail($request->post('id'));


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

        $suggestion = Suggestion::findOrFail($request->id);

        $suggestion->delete();

        return response()->json([
            'success' => true,
        ]);
    }


    public function rejectSaranRW($id)
    {
        $suggestion = Suggestion::find($id);

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
        $suggestion = Suggestion::find($id);

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
        $suggestion = Suggestion::find($id);

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
        $suggestion = Suggestion::find($id);

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
    public function ShowRT($id)
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];


        $suggestion = Suggestion::findOrFail($id);
        return view('rt.detailSaranRT', compact('suggestion', 'breadcrumb'));
    }

    public function ShowRW($id)
    {
        $breadcrumb = (object)[
            'title' => 'Kegiatan',
            'subtitle' => 'Usulan Kegiatan',
        ];


        $suggestion = Suggestion::findOrFail($id);
        return view('rw.detailSaranRW', compact('suggestion', 'breadcrumb'));
    }
}
