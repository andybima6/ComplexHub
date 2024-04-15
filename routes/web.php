<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kegiatanController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/daftar-kegiatan', [KegiatanController::class, 'index'])->name('daftar-kegiatan');
Route::get('/dashboard', [dashboardController::class,'index']);
Route::get('/RT.usulanKegiatanRT', [dashboardController::class,'index']);
