<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IuranRWController extends Controller
{
    public function dataiuranRW()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Data Iuran RW',
            'subtitle' => '',
        ];
        return view('RW/dataiuranRW', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function historyRW()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'History Iuran RW',
            'subtitle' => '',
        ];
        return view('RW/historyRW', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function form()
    {
        $breadcrumb = (object) [
            'title' => 'Form Input Iuran',
            'subtitle' => '',
        ];
        return view('warga.form', ['breadcrumb' => $breadcrumb]);
    }

    public function cari(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Form Iuran RW',
            'subtitle' => '',
        ];

        $rtIdSearch = $request->input('rt_id_search');

        $query = Iuran::query();

        if ($rtIdSearch) {
            $query->where('rt_id', $rtIdSearch);
        }

        $iuran = $query->get();

        return view('RW/dataiuranRW', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function ubah(string $id)
    {
        $iuran = Iuran::find($id);
        if (!$iuran) {
            return redirect('/RW/dataiuranRW')->with('error', 'Data iuran tidak ditemukan');
        }

        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RW/ubahIuran', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function perbarui(Request $request, string $id)
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
            return redirect('/RW/dataiuranRW')->with('error', 'Data iuran tidak ditemukan');
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

        return redirect('/RW/dataiuranRW')->with('success', 'Data iuran berhasil diubah');
    }

    public function hapus(string $id)
    {
        $check = Iuran::find($id);
        if (!$check) {
            return redirect('/RW/dataiuranRW')->with('error', 'Data iuran tidak ditemukan');
        }

        try {
            Iuran::destroy($id);
            return redirect('/RW/dataiuranRW')->with('success', 'Data iuran berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/RW/dataiuranRW')->with('error', 'Data iuran gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}

