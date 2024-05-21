<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $izinUsaha = Umkm::all();
        $breadcrumb = (object)[
            'title' => 'Landing Page',
            'subtitle' => '',
        ];
    return view('landingPage', compact('izinUsaha'), ['breadcrumb' => $breadcrumb]);
    }
}
