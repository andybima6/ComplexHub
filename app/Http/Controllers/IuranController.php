<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class IuranController extends Controller
{
    public function kasindexRT()
    {
        $index = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RT/kasIuranRT', compact('index'), ['breadcrumb' => $breadcrumb]);
    }
    public function indexiuranRT()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('RT.iuranRT', ['breadcrumb' => $breadcrumb]);
    }
    public function pengeluaranindexWarga()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('warga/index', ['breadcrumb' => $breadcrumb]);
    }
    public function formWarga()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('warga.form', ['breadcrumb' => $breadcrumb]);
    }
    public function cekdataRT()
    {
        $breadcrumb = (object) [
            'title' => 'Pengeluaran RT',
            'subtitle' => '',
        ];
        return view('RT/cekdataRT', ['breadcrumb' => $breadcrumb]);
    }

    public function dataiuranRT()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Data Iuran RT',
            'subtitle' => '',
        ];
        return view('RT/dataiuranRT', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }
    public function dataiuranRW()
    {
        $iuran = Iuran::all();
        $breadcrumb = (object) [
            'title' => 'Data Iuran RW',
            'subtitle' => '',
        ];
        return view('RW/dataiuranRW', compact('iuran'), ['breadcrumb' => $breadcrumb]);
    }

    public function storeIuran(Request $request)
    {
        // Log the incoming request data
        Log::info('Request data: ', $request->all());

        // Validate data
        $validatedData = $request->validate([
            'rt_id' => 'required|exists:data_rt,id',
            'periode' => 'required|date',
            'total' => 'required|numeric',
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Log the validated data
        Log::info('Validated data: ', $validatedData);

        // Save the file
        if ($request->hasFile('bukti')) {
            $buktiPath = $request->file('bukti')->store('bukti', 'public');
        } else {
            $buktiPath = null;
        }

        try {
            // Create a new iuran entry
            Iuran::create([

                'periode' => $validatedData['periode'],
                'total' => $validatedData['total'],
                'bukti' => $buktiPath,
            ]);

            // Log success message
            Log::info('Iuran entry created successfully');

            // Redirect or respond
            return redirect()->back()->with('success', 'Iuran berhasil disimpan');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error saving iuran: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan iuran');
        }
    }

    


    
}
