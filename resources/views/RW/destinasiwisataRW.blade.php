@extends('layouts.welcome')
@section('content')
<main class="mx-auto p-4 md:p-36 contain-responsive min-h-screen" style="background-color: #FBEEC1;">
    <div id="gambar-container" class="relative text-center">
        <img src="{{ asset('img/background.png') }}" alt="Gambar" class="w-full h-auto mx-auto md:w-3/4 lg:w-1/2">
        <div id="teks-di-gambar" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-lg md:text-2xl lg:text-4xl font-bold">
            Selamat Datang Administrator, di Sistem Pendukung Keputusan pemilihan Destinasi Wisata
        </div>
        <div id="tombol-container" class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
            <a href="{{ route('kriteria.index') }}" class="tombol bg-blue-500 text-white px-4 py-2 rounded-md">SAW</a>
            <a href="{{ url('/metode_dua_spk/kriteriadestinasi2') }}" class="tombol bg-blue-500 text-white px-4 py-2 rounded-md">MAUT</a>
        </div>
    </div>
</main>
@endsection

<style>
    @media (max-width: 640px) {
        #teks-di-gambar {
            font-size: 20px; /* Sesuaikan ukuran font untuk HP */
        }
        #tombol-di-gambar {
            top: calc(70% + 40px); /* Sesuaikan jarak tombol dari teks untuk HP */
        }
    }
</style>
