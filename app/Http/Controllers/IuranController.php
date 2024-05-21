<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class iuranController extends Controller
{
    public function kasindexRT()
    {
        $breadcrumb = (object) [
            'title' => 'Kas RT',
            'subtitle' => '',
        ];
        return view('RT/kasIuranRT', ['breadcrumb' => $breadcrumb]);
    }
    public function pengeluaranindexRT()
    {
        $breadcrumb = (object) [
            'title' => 'Iuran',
            'subtitle' => '',
        ];
        return view('RT.pengeluaranRT', ['breadcrumb' => $breadcrumb]);
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
}
