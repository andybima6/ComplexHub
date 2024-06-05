@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-8 sm:p-36 container-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="container mx-auto p-4 bg-gray-100 rounded-lg shadow-md">
        <header class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Tambah Anggota Keluarga</h2>
            <a href="{{ route('data_kartu_keluargas.index') }}" class="btn-primary px-4 py-2 rounded-md focus:outline-none">Kembali</a>
        </header>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('storeAnggota', $dataKartuKeluarga->id) }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="kk_id" value="{{ $dataKartuKeluarga->id }}">

            <div class="flex flex-col">
                <label for="nama" class="text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>

            <div class="flex flex-col">
                <label for="nik" class="text-gray-700 font-medium mb-2">NIK</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nik" name="nik" value="{{ old('nik') }}" required>
            </div>

            <div class="flex flex-col">
                <label for="tanggal_lahir" class="text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
            </div>

            <div class="flex flex-col">
                <label for="hubungan_keluarga" class="text-gray-700 font-medium mb-2">Hubungan Keluarga</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="hubungan_keluarga" name="hubungan_keluarga" required>
                    <option value="Ibu" {{ old('hubungan_keluarga') == 'Ibu' ? 'selected' : '' }}>Ibu</option>
                    <option value="Ayah" {{ old('hubungan_keluarga') == 'Ayah' ? 'selected' : '' }}>Ayah</option>
                    <option value="Anak" {{ old('hubungan_keluarga') == 'Anak' ? 'selected' : '' }}>Anak</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="alamat" class="text-gray-700 font-medium mb-2">Alamat</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
            </div>

            <div class="flex flex-col">
                <label for="jenis_kelamin" class="text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="golongan_darah" class="text-gray-700 font-medium mb-2">Golongan Darah</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="golongan_darah" name="golongan_darah" required>
                    <option value="A" {{ old('golongan_darah') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('golongan_darah') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ old('golongan_darah') == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ old('golongan_darah') == 'O' ? 'selected' : '' }}>O</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="status_perkawinan" class="text-gray-700 font-medium mb-2">Status Perkawinan</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="status_perkawinan" name="status_perkawinan" required>
                    <option value="Menikah" {{ old('status_perkawinan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Belum Menikah" {{ old('status_perkawinan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                </select>
            </div>
            <button type="submit" class="btn-primary w-full px-4 py-2 rounded-md focus:outline-none">Simpan</button>
        </form>
    </div>
</main>
@endsection

<style>
    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    @media screen and (max-width: 640px) {
        .container-responsive {
            padding: 8px; /* Sesuaikan padding untuk layar yang lebih kecil */
        }

        .container {
            max-width: none; /* Hapus batasan lebar untuk container */
        }

        /* Tambahkan styling tambahan sesuai kebutuhan pada layar kecil */
    }
</style>
