@extends('layouts.welcome')
@section('content')
<main class="container">
    <div class="detail flex justify-center items-center h-screen relative left-32">
        <div class="flex flex-col items-center py-5" style="max-width: none; width: 100%;">
            <div class="rounded-md relative p-8 mb-8 mx-auto" style="background-color: white; max-width: 3000px; width: 90%; height: 500px; position: relative; border-radius: 16px;">
                <p class="text-start font-semibold text-xl mb-4">Detail Saran Kegiatan</p>
                <hr class="mb-4">
                <div class="mb-4">
                    <label for="namaLengkap" class="block text-lg font-bold text-gray-700">Nama  Kegiatan:</label>
                    <p class="font-medium">Mancing</p>
                </div>
                <div class="mb-4">
                    <label for="namaUsaha" class="block text-lg font-bold text-gray-700">Keterangan : </label>
                    <p class="font-medium">Kegiatan 3</p>
                </div>
                <div class="mb-4">
                    <label for="fotoProduk" class="block text-lg font-bold text-gray-700">Foto Produk :</label>
                    <img src="{{ asset('/img/kopikap.jpg') }}" alt="">
                </div>
                <div class="mb-4">
                    <label for="namaUsaha" class="block text-lg font-bold text-gray-700">Status : </label>
                    <p class="font-medium">Kegiatan 3</p>
                </div>
                <div class="mb-4">
                    <label for="namaUsaha" class="block text-lg font-bold text-gray-700">Lingkup : </label>
                    <p class="font-medium">Penduduk</p>
                </div>
                <div class="absolute bottom-0 right-32  h-8 w-16 right-0 mb-4">
                    <button type="button" class=" bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2"><a href="{{ route('tambahKegiatanPD') }}" style="text-decoration:none">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
