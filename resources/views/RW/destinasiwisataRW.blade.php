@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">

</body>
</html>
<style>
    #gambar-container {
        text-align: center;
    }
    #gambar-container img {
        width: 90%; 
        height: auto;
        display: block;
        margin: 0 auto;
        border-radius: 0;
    }
    #teks-di-gambar {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 40px; /* Ubah ukuran font sesuai kebutuhan */
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    #tombol-di-gambar {
        position: absolute;
        top: calc(70% + 80px); /* Sesuaikan jarak tombol dari teks */
        left: 50%;
        transform: translateX(-50%);
        background-color: #4c8baf; /* Warna latar belakang tombol */
        color: rgb(255, 255, 255);
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #tombol-container {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
    }
    .tombol {
        background-color: #4c89af;
        color: rgb(255, 255, 255);
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-align: center;
        display: inline-block;
        margin: 0 10px;
        cursor: pointer;
    }
    .tombol.metode1 {
    font-weight: bold;
}

.tombol.metode2 {
    font-weight: bold;
}


</style>

<div id="gambar-container">
    <img src={{ asset('img/background.png') }} alt="Gambar">
    <div id="teks-di-gambar">Selamat Datang Administrator, di Sistem Pendukung Keputusan pemilihan Destinasi Wisata </div>
    <div id="tombol-container">
        <!-- Menggunakan tag anchor untuk membuat tombol yang mengarahkan ke tampilan HTML -->
        <a href="{{ url('destinasi/Destinasi/kriteriadestinasiRW') }}" class="tombol">Metode 1</a>
        <a href="{{ url('destinasi/Destinasi/kriteriadestinasiRW') }}" class="tombol">Metode 2</a>
    </div>
</div>

</main>
@endsection