@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 container-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="container mx-auto p-4 bg-gray-100 rounded-lg shadow-md">
        <header class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Edit Anggota Keluarga</h2>
            <a href="{{ route('data_kartu_keluargas.show', $dataKartuKeluarga->id) }}" class="btn-primary px-4 py-2 rounded-md focus:outline-none">Kembali</a>
        </header>

        <form action="{{ route('updateAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggotaKeluarga->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label for="nama" class="text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nama" name="nama" value="{{ $anggotaKeluarga->nama }}" required>
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="nik" class="text-gray-700 font-medium mb-2">NIK</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="nik" name="nik" value="{{ $anggotaKeluarga->nik }}" required>
                @error('nik')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="tanggal_lahir" class="text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                <input type="date" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggotaKeluarga->tanggal_lahir }}" required>
                @error('tanggal_lahir')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="hubungan_keluarga" class="text-gray-700 font-medium mb-2">Hubungan Keluarga</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="hubungan_keluarga" name="hubungan_keluarga" value="{{ $anggotaKeluarga->hubungan_keluarga }}" required>
                @error('hubungan_keluarga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="status_perkawinan" class="text-gray-700 font-medium mb-2">Status Perkawinan</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="status_perkawinan" name="status_perkawinan" required>
                    <option value="Belum Menikah" {{ $anggotaKeluarga->status_perkawinan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ $anggotaKeluarga->status_perkawinan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                </select>
                @error('status_perkawinan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="alamat" class="text-gray-700 font-medium mb-2">Alamat</label>
                <input type="text" class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="alamat" name="alamat" value="{{ $anggotaKeluarga->alamat }}" required>
                @error('alamat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="jenis_kelamin" class="text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" {{ $anggotaKeluarga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $anggotaKeluarga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="golongan_darah" class="text-gray-700 font-medium mb-2">Golongan Darah</label>
                <select class="border rounded-md px-2 py-1 focus:outline-blue-500 focus:ring-1 focus:ring-blue-500" id="golongan_darah" name="golongan_darah" required>
                    <option value="A" {{ $anggotaKeluarga->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $anggotaKeluarga->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ $anggotaKeluarga->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ $anggotaKeluarga->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                </select>
                @error('golongan_darah')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto_kartu_keluarga" class="form-label">Foto Kartu Keluarga</label>
                <input type="file" class="form-control" id="foto_kartu_keluarga" name="foto_kartu_keluarga">
                @error('foto_kartu_keluarga')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
@endsection
