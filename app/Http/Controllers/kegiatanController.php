<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kegiatan',
        ];
        return view ('usulanKegiatan',['breadcrumb'=>$breadcrumb]);
    }
}
