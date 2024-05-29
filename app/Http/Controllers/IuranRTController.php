<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class IuranRTController extends Controller
{
    public function kasindexRT()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RT/kasIuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }
    public function historyRT()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'History Kas RT',
            'subtitle' => '',
        ];
        return view('RT/historyRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function search(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Form Iuran RW',
            'subtitle' => '',
        ];
        $rtSearch = $request->input('rt_search');
        $iuran = Iuran::where('nama', 'like', '%' . $rtSearch . '%')->get();

        return view('RT/kasIuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
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
            'nama' => 'required|string',
            'periode' => 'required|date',
            'total' => 'required|numeric',
            'keterangan' => 'required|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png',
            'rt_id' => 'required|exists:data_rt,id',
            'status' => 'required|string',
        ]);

        $iuran = Iuran::find($id);
        if (!$iuran) {
            return redirect('/RT/kasIuranRT')->with('error', 'Data iuran tidak ditemukan');
        }

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
            return redirect('/RT/kasIuranRT')->with('success', 'Data iuran berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/RT/kasIuranRT')->with('error', 'Data iuran gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}