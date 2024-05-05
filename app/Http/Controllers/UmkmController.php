<?php
namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function indexDataRT() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha RT',
        ];

        return view('RT.dataUsahaRT', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexDataRW() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha RW',
        ];

        return view('RW.dataUsahaRW', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinRT() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha RT',
        ];

        return view('RT.izinUsahaRT', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinRW() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha RW',
        ];

        return view('RW.izinUsahaRW', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function indexIzinPenduduk() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha Penduduk',
        ];

        return view('Penduduk.izinUsahaPenduduk', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDataPenduduk() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Data Usaha Penduduk',
        ];

        return view('Penduduk.dataUsahaPenduduk', ['breadcrumb' => $breadcrumb]);
    }

    public function indexDetailIzinPenduduk() {
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Detail Izin Usaha Penduduk',
        ];

        return view('Penduduk.detailIzinUsaha', ['breadcrumb' => $breadcrumb]);
    }

    public function showUmkm() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'UMKM',
            'subtitle' => 'Izin Usaha Penduduk',
        ];
        return view('Penduduk.izinUsahaPenduduk', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }

    public function storeIzin(Request $request) {
        $validateData = $request->validate([
            'namaLengkap' => 'required',
            'namaUsaha' => 'required',
            'deskripsiUsaha' => 'required',
            'fotoProduk' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        Umkm::create([
            'nama' => $validateData['namaLengkap'],
            'namaUsaha' => $validateData['namaUsaha'],
            'deskripsiUsaha' => $validateData['deskripsiUsaha'],
            'fotoProduk' => $request->file('fotoProduk')->store('foto_produk'),
        ]);

        return redirect()->route('izinUsahaPenduduk')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id) {
        $umkm = Umkm::find($id);
        return view('Penduduk.izinUsahaPenduduk', compact('umkm'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'namaLengkap' => 'required',
            'namaUsaha' => 'required',
            'deskripsiUsaha' => 'required',
            'fotoProduk' => 'required',
        ]);
        Umkm::find($id)->update($request->all());
        return redirect()->route('Penduduk.izinUsahaPenduduk')->with('success', 'Data berhasil diperbaruhi');
    }

    public function updateStatus(Request $request, $id) {
        if (Auth::user()->role !== 'RT' && Auth::user()->role !== 'RW') {
            return response()->json(['message' => 'Anda tidak memiliki izin untuk mengubah status.'], 403);
        }
        $umkm = Umkm::findOrFail($id);

        if (Auth::user()->role === 'RT') {
            $umkm->status_rt = $request->status;
        } elseif (Auth::user()->role === 'RW') {
            $umkm->status_rw = $request->status;
        }

        $umkm->save();

        return response()->json(['message' => 'Status berhasil diperbaruhi.']);
    }

    public function destroy($id) {
        Umkm::destroy($id);
        return redirect()->route('Penduduk/izinUsahaPenduduk')->with('success', 'Data berhasil dihapus');
    }
}