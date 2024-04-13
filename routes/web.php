<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kegiatanController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/usulanKegiatan', [kegiatanController::class,'index']);
Route::get('/dashboard', [dashboardController::class,'index']);
