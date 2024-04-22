@extends('layouts.welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Penduduk</h1>
                <form action="{{ route('penduduk.update', $penduduk->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $penduduk->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $penduduk->nik }}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Laki-laki" {{ $penduduk->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $penduduk->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usia">Usia</label>
                        <input type="text" class="form-control" id="usia" name="usia" value="{{ $penduduk->usia }}">
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="{{ $penduduk->tmp_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $penduduk->tgl_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select class="form-control" id="agama" name="agama">
                            <option value="Islam" {{ $penduduk->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Katolik" {{ $penduduk->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Protestan" {{ $penduduk->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                            <option value="Konghucu" {{ $penduduk->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            <option value="Buddha" {{ $penduduk->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                            <option value="Hindu" {{ $penduduk->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $penduduk->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status_pernikahan">Status Pernikahan</label>
                        <select class="form-control" id="status_pernikahan" name="status_pernikahan">
                            <option value="Kawin" {{ $penduduk->status_pernikahan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Belum Kawin" {{ $penduduk->status_pernikahan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Cerai" {{ $penduduk->status_pernikahan == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_keluarga">Status Keluarga</label>
                        <select class="form-control" id="status_keluarga" name="status_keluarga">
                            <option value="Kepala Rumah Tangga" {{ $penduduk->status_keluarga == 'Kepala Rumah Tangga' ? 'selected' : '' }}>Kepala Rumah Tangga</option>
                            <option value="Isteri" {{ $penduduk->status_keluarga == 'Isteri' ? 'selected' : '' }}>Isteri</option>
                            <option value="Anak" {{ $penduduk->status_keluarga == 'Anak' ? 'selected' : '' }}>Anak</option>
                            <option value="Lainnya" {{ $penduduk->status_keluarga == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $penduduk->pekerjaan }}">
                    </div>
                    <!-- Tambahkan input fields sesuai kebutuhan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
