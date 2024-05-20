<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $breadcrumb = (object)[
            'title' => 'Landing Page',
            'subtitle' => '',
        ];
    return view('landingPage', ['breadcrumb' => $breadcrumb]);
    }
}
