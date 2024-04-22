<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKkController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\kegiatanController;

Route::get('/welcome', function () {
    return view('layouts.welcome');
});

Route::get('/dashboard', [dashboardController::class,'index']);
// Route::get('/RT.usulanKegiatanRT', [dashboardController::class,'index']);

// Data Kk
Route::get('/kk', [DataKkController::class, 'index'])->name('kk.index');
Route::get('/kk/create', [DataKkController::class, 'create'])->name('kk.create');
Route::post('/kk', [DataKkController::class, 'store'])->name('kk.store');
Route::get('/kk/{id}', [DataKkController::class, 'show'])->name('kk.show');
Route::get('/kk/{id}/edit', [DataKkController::class, 'edit'])->name('kk.edit');
Route::put('/kk/{id}', [DataKkController::class, 'update'])->name('kk.update');
Route::delete('/kk/{id}', [DataKkController::class, 'destroy'])->name('kk.destroy');

// Data Penduduk
Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
Route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
Route::get('/penduduk/{penduduk}', [PendudukController::class, 'show'])->name('penduduk.show');
Route::get('/penduduk/{penduduk}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
Route::put('/penduduk/{penduduk}', [PendudukController::class, 'update'])->name('penduduk.update');
Route::delete('/penduduk/{penduduk}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RT/usulanKegiatanRT', [kegiatanController::class,'indexRT']);
});


Route::group(['prefix' => 'usulan'], function(){
    Route::get('/RW/usulanKegiatanRW', [kegiatanController::class,'indexRW']);
});

Route::group(['prefix' => 'usulan'], function(){
    Route::get('/Penduduk/usulanKegiatanPD', [kegiatanController::class,'indexPenduduk']);
});
