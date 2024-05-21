<!-- resources/views/anggota_keluargas/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Anggota Keluarga
    </div>
    <div class="card-body">
        <form action="{{ route('updateAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggotaKeluarga->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggotaKeluarga->nama }}">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $anggotaKeluarga->nik }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggotaKeluarga->tanggal_lahir }}">
            </div>
            <div class="mb-3">
                <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" value="{{ $anggotaKeluarga->hubungan_keluarga }}">
            </div>
            <div class="mb-3">
                <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                    <option value="Belum Menikah" {{ $anggotaKeluarga->status_perkawinan == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    <option value="Menikah" {{ $anggotaKeluarga->status_perkawinan == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto_kartu_keluarga" class="form-label">Foto Kartu Keluarga</label>
                <input type="file" class="form-control" id="foto_kartu_keluarga" name="foto_kartu_keluarga">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

