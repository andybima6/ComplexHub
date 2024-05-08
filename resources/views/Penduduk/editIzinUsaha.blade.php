@extends('layouts.welcome')
@section('content')
<div id="popupForm" class="fixed top-20 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded-md p-8" style="border-radius: 16px; width: 400px;">
        <h2 class="text-lg font-semibold mb-4">Form Edit Izin Usaha</h2>
        <hr>
        <form id="editIzinForm" action="{{ route('updateIzin', $umkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk proses update -->

            <div class="mt-4 mb-4">
                <label for="nama_warga" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama_warga" name="nama_warga" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6" value="{{ $umkm->nama_warga }}">
            </div>

            <div class="mb-4">
                <label for="nama_usaha" class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                <input type="text" id="nama_usaha" name="nama_usaha" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6" value="{{ $umkm->nama_usaha }}">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi Usaha</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6">{{ $umkm->deskripsi }}</textarea>
            </div>

            <div class="mb-4">
                <label for="foto_produk" class="block text-sm font-medium text-gray-700">Foto Produk</label>
                <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/' . $umkm->foto_produk) }}" alt="Foto Produk">
                <input type="file" id="foto_produk" name="foto_produk" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6" onchange="previewImage()">
            </div>

            <div class="text-right">
                <a href="{{ route('izinUsahaPenduduk') }}"><button type="button" id="closePopupBtn" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2">Batal</button></a>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection