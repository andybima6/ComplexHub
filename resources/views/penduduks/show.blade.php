@extends('layouts.welcome')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
                <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28">
                    <div class="col-md-12">
                        <h1>Detail Penduduk</h1>
                        <div class="mb-3">
                            <label for="nama" class="font-bold">Nama:</label>
                            <p id="nama">{{ $penduduk->nama }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="font-bold">NIK:</label>
                            <p id="nik">{{ $penduduk->nik }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="font-bold">Jenis Kelamin:</label>
                            <p id="gender">{{ $penduduk->gender }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="font-bold">Usia:</label>
                            <p id="usia">{{ $penduduk->usia }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="tmp_lahir" class="font-bold">Tempat Lahir:</label>
                            <p id="tmp_lahir">{{ $penduduk->tmp_lahir }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir" class="font-bold">Tanggal Lahir:</label>
                            <p id="tgl_lahir">{{ $penduduk->tgl_lahir }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="font-bold">Agama:</label>
                            <p id="agama">{{ $penduduk->agama }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="font-bold">Alamat:</label>
                            <p id="alamat">{{ $penduduk->alamat }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="status_pernikahan" class="font-bold">Status Pernikahan:</label>
                            <p id="status_pernikahan">{{ $penduduk->status_pernikahan }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="status_keluarga" class="font-bold">Status Keluarga:</label>
                            <p id="status_keluarga">{{ $penduduk->status_keluarga }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan" class="font-bold">Pekerjaan:</label>
                            <p id="pekerjaan">{{ $penduduk->pekerjaan }}</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
