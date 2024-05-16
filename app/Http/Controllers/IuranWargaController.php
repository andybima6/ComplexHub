<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IuranWargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Input Iuran',
            'subtitle' => '',
        ];
        return view('warga/index', ['breadcrumb' => $breadcrumb]);
    }
    public function form()
    {
        $breadcrumb = (object) [
            'title' => 'Form Input Iuran',
            'subtitle' => '',
        ];
        return view('warga/form', ['breadcrumb' => $breadcrumb]);
    }
}
