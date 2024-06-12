@extends('layouts.welcome')
@section('content')
<main class="mx-auto contain-responsive">
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col items-center py-5" style="max-width: none; width: 100%;">
            <div class="rounded-md relative p-8 mb-8 mx-auto" style="background-color: white; max-width: 3000px; width: 90%; height: 650px; position: relative; border-radius: 16px;">
                <p class="text-start font-semibold text-xl mb-4">Detail Izin Usaha</p>
                <hr class="mb-4">
                <div class="mb-4">
                    <label for="namaLengkap" class="block text-lg font-bold text-gray-700">Nama :</label>
                    <p class="font-medium">{{ $izinUsaha->nama_warga }}</p>
                </div>
                <div class="mb-4">
                    <label for="namaUsaha" class="block text-lg font-bold text-gray-700">Nama Usaha : </label>
                    <p class="font-medium">{{ $izinUsaha->nama_usaha }}</p>
                </div>
                <div class="mb-4">
                    <label for="deskripsiUsaha" class="block text-lg font-bold text-gray-700">Deskripsi :</label>
                    <p class="font-medium">{{ $izinUsaha->deskripsi }}</p>
                </div>
                <div class="mb-4">
                    <label for="fotoProduk" class="block text-lg font-bold text-gray-700">Foto Produk :</label>
                    <img class="mt-10 ml-0 object-cover" src="{{ asset('storage/' . $izinUsaha->foto_produk) }}" alt="">
                </div>
                <div class="absolute right-16 bottom-4">
                    <a href="{{ route('izinUsahaPenduduk') }}" style="text-decoration:none"><button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
