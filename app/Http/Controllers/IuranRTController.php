<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IuranRTController extends Controller
{
    public function dataiuranRT()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Data Iuran RW',
            'subtitle' => '',
        ];
        return view('RT/kasiuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }
    public function kasindexRT()
    {
        $user = Auth::user();
        $iuran = Iuran::where('rt_id', $user->rt)->get();
        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RT/kasIuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function historyRT()
    {
        $user = auth()->user();
        $userId = $user->rt_id;
        // $iuran = Iuran::where('rt_id', $user->rt)->get();
        $breadcrumb = (object) [
            'title' => 'History Kas RT',
            'subtitle' => '',
        ];
        $iuran = Iuran::where('rt_id', $userId)->get();
        return view('RT/historyRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function search(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Form Iuran RW',
            'subtitle' => '',
        ];
        $rtSearch = $request->input('rt_search');
        $user = Auth::user();
        $iuran = Iuran::where('rt_id', $user->rt)
            ->where('nama', 'like', '%' . $rtSearch . '%')
            ->get();

        return view('RT/kasIuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }
    public function form()
    {
        $breadcrumb = (object) [
            'title' => 'Form Input Iuran',
            'subtitle' => '',
        ];
        return view('RT/formIuran', ['breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        $validatedData = $request->validate([
            'user_id' => 'required|int',
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
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'periode' => $request->periode,
            'total' => $request->total,
            'keterangan' => $request->keterangan,
            'bukti' => $filePath,
            'rt_id' => $request->rt_id
        ]);

        return view('RT/kasiuranRT', ['breadcrumb' => $breadcrumb]);
    }

    public function edit(string $id)
    {
        $iuran = Iuran::find($id);
        if (!$iuran) {
            return redirect('/RT/kasIuranRT')->with('error', 'Data iuran tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RT/editIuran', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|int',
            'nama' => 'required|string',
            'periode' => 'required|date',
            'total' => 'required|numeric',
            'keterangan' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png',
            'rt_id' => 'required|exists:data_rt,id',
            'status' => 'required|string|in:diproses,disetujui,ditolak',

        ]);

        $iuran = Iuran::find($id);
        if (!$iuran) {
            return redirect('/RT/kasIuranRT')->with('error', 'Data iuran tidak ditemukan');
        }

        $iuran->user_id = $request->user_id;
        $iuran->nama = $request->nama;
        $iuran->periode = $request->periode;
        $iuran->total = $request->total;
        $iuran->keterangan = $request->keterangan;
        $iuran->rt_id = $request->rt_id;
        $iuran->status = $request->status;

        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti');
            $iuran->bukti = $buktiPath;
        }

        $iuran->save();

        return redirect('/RT/kasIuranRT')->with('success', 'Data iuran berhasil diubah');
    }


    public function destroy(string $id)
    {
        $check = Iuran::find($id);
        if (!$check) {
            return redirect('/RT/kasIuranRT')->with('error', 'Data iuran tidak ditemukan');
        }

        try {
            Iuran::destroy($id);
            return redirect('/RT/historyRT')->with('success', 'Data iuran berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/RT/historyRT')->with('error', 'Data iuran gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function accIuranRT($id)
    {
        $iuran = Iuran::find($id);

        $iuran->status = 'disetujui';
        $iuran->save();
        return redirect(route('historyRT'));
    }

    public function tolakIuranRT($id)
    {
        $iuran = Iuran::find($id);

        $iuran->status = 'ditolak';
        $iuran->save();
        return redirect(route('historyRT'));
    }
}