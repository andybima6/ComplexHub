@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4">
            <h2 class="text-2xl font-semibold">Tambah Anggota Keluarga</h2>
            <a href="{{ route('data_kartu_keluargas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('store_anggota_keluarga') }}" method="POST">
                @csrf
                <input type="hidden" name="kk_id" value="{{ $dataKartuKeluarga->id }}">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="mb-3">
                    <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                    <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" required>
                </div>
                <div class="mb-3">
                    <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                    <select class="form-select" id="status_perkawinan" name="status_perkawinan" required>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</main>
@endsection
