@extends('layouts.welcome')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
            <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28 border border-gray-300">
                <div class="col-md-12">
                    <h1>Tambah Penduduk</h1>
                    <form action="{{ route('penduduk.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik">
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" id="usia" name="usia">
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="tmp_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" id="agama" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <select class="form-control" id="status_pernikahan" name="status_pernikahan">
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="status_keluarga">Status Keluarga</label>
                            <select class="form-control" id="status_keluarga" name="status_keluarga">
                                <option value="Kepala Rumah Tangga">Kepala Rumah Tangga</option>
                                <option value="Isteri">Isteri</option>
                                <option value="Anak">Anak</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <hr> <!-- Pembatas -->
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                        </div>
                        <hr> <!-- Pembatas -->
                        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700">Simpan</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
