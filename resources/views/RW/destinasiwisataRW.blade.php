@extends('layouts.welcome')
@section('content')
<main class="mx-auto p-8 sm:p-16 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div id="gambar-container" class="relative text-center">
        <img src="{{ asset('img/background.png') }}" alt="Gambar" class="w-full h-auto mx-auto md:w-3/4 lg:w-4/5 xl:w-3/4 2xl:w-2/3">
        <div id="teksGambar" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-lg md:text-2xl lg:text-4xl font-bold px-4">
            Selamat Datang Administrator, di Sistem Pendukung Keputusan pemilihan Destinasi Wisata
        </div>
    </div>
    
    <div id="tombol-container" class="relative mt-4 md:absolute md:bottom-10 md:left-1/2 md:transform md:-translate-x-1/2 flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 text-center">
        <a href="{{ route('kriteria.index') }}" class="bg-transparent hover:bg-[#385668] text-[#385668] font-semibold hover:text-white py-2 px-4 border border-[#385668] hover:border-transparent rounded" style="font-size: 24px;">SAW</a>
        <a href="{{ url('/metode_dua_spk/kriteriadestinasi2') }}" class="bg-transparent hover:bg-[#385668] text-[#385668] font-semibold hover:text-white py-2 px-4 border border-[#385668] hover:border-transparent rounded" style="font-size: 24px;">MAUT</a>
    </div>
</main>


<style>
    @media (max-width: 640px) {
        #teksGambar {
            font-size: 1rem; /* Sesuaikan ukuran font untuk mobile */
            padding: 0 10px; /* Tambahkan padding untuk keterbacaan yang lebih baik */
        }
        .tombol {
            font-size: 20px; /* Sesuaikan ukuran font tombol untuk mobile */
            padding: 0.5rem 1rem; /* Sesuaikan padding tombol untuk mobile */
            background-color: #385668;
            color: #385668;
        }
    }

    @media (min-width: 641px) {
        #tombol-container {
            bottom: 20%; /* Pindahkan tombol ke atas */
        }
    }

</style>

<div id="gambar-container">
    <img src={{ asset('img/background.png') }} alt="Gambar">
    <div id="teks-di-gambar">Selamat Datang Administrator, di Sistem Pendukung Keputusan pemilihan Destinasi Wisata </div>
    <div id="tombol-container">
        <!-- Menggunakan tag anchor untuk membuat tombol yang mengarahkan ke tampilan HTML -->

        <a href="{{ route('kriteria.index') }}" class="tombol">SAW</a>
        <a href="{{ url('/metode_dua_spk/kriteriadestinasi2') }}"class="tombol">MAUT</a>

    </div>
</div>

@endsection
