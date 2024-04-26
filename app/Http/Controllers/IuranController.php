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
        return view('RT/pengeluaranRT', ['breadcrumb' => $breadcrumb]);
    }
    public function pengeluaranindexRT()
    {
        $breadcrumb = (object) [
            'title' => 'Pengeluaran RT',
            'subtitle' => '',
        ];
        return view('RT/pengeluaranRT', ['breadcrumb' => $breadcrumb]);
    }
}
