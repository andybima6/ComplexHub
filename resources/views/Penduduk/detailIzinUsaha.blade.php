@extends('layouts.welcome')
@section('content')
<div class="container">
    <div class="flex justify-center items-center h-screen">
        <div class="flex flex-col items-center py-5" style="max-width: none; width: 100%;">
            <div class="rounded-md relative p-8 mt-1 mb-8 mx-auto" style="background-color: white; width: 95%; height: 100%; position: relative; border-radius: 16px;">
                <p class="text-start font-semibold text-xl mb-4">Detail Izin Usaha</p>
                <hr class="mb-4">
                <div class="mb-4">
                    <label for="namaLengkap" class="block text-lg font-bold text-gray-700">Nama :</label>
                    <p class="font-medium">Miguel Santoso</p>
                </div>
                <div class="mb-4">
                    <label for="namaUsaha" class="block text-lg font-bold text-gray-700">Nama Usaha : </label>
                    <p class="font-medium">Mi Amor Bakery</p>
                </div>
                <div class="mb-4">
                    <label for="deskripsiUsaha" class="block text-lg font-bold text-gray-700">Deskripsi :</label>
                    <p class="font-medium">Kami menjual aneka ragam kue, dari kue basah hingga kue kering. Menerima pesanan.</p>
                </div>
                <div class="mb-4">
                    <label for="fotoProduk" class="block text-lg font-bold text-gray-700">Foto Produk :</label>
                    <img src="{{ asset('/img/kopikap.jpg') }}" alt="">
                </div>
                <div class="mb-4">
                    <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2"><a href="{{ route('izinUsahaPenduduk') }}" style="text-decoration:none">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
