@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 container-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="container mx-auto p-4 bg-gray-100 rounded-lg shadow-md">
        <header class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Tambah Anggota Keluarga</h2>
            <a href="{{ route('data_kartu_keluargas.index') }}" class="btn-primary px-4 py-2 rounded-md focus:outline-none">Kembali</a>
        </header>

        <form action="{{ route('store_anggota_keluarga') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="kk_id" value="{{ $dataKartuKeluarga->id }}">

            <div class="flex flex-col">
                <label for="nama" class="text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nama" name="nama" required>
            </div>

            <div class="flex flex-col">
                <label for="nik" class="text-gray-700 font-medium mb-2">NIK</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nik" name="nik" required>
            </div>

            <div class="flex flex-col">
                <label for="tanggal_lahir" class="text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>

            <div class="flex flex-col">
                <label for="hubungan_keluarga" class="text-gray-700 font-medium mb-2">Hubungan Keluarga</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="hubungan_keluarga" name="hubungan_keluarga" required>
                    <option value="Ibu">Ibu</option>
                    <option value="Ayah">Ayah</option>
                    <option value="Anak">Anak</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="alamat" class="text-gray-700 font-medium mb-2">Alamat</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" required>
            </div>

            <div class="flex flex-col">
                <label for="jenis_kelamin" class="text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="golongan_darah" class="text-gray-700 font-medium mb-2">Golongan Darah</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="golongan_darah" name="golongan_darah" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            <button type="submit" class="btn-primary px-4 py-2 rounded-md focus:outline-none">Simpan</button>
        </form>
    </div>
</main>
@endsection
