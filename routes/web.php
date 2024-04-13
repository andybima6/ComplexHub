<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/usulanKegiatan', function () {
    return view('usulanKegiatan');
});
