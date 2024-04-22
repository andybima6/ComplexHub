@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajukan Pengaduan</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('saran-pengaduan.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input id="judul" type="text" class="form-control" name="judul" value="{{ old('judul') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select id="jenis" class="form-control" name="jenis" required>
                                <option value="" selected disabled>Pilih jenis</option>
                                <option value="Saran" {{ old('jenis') == 'Saran' ? 'selected' : '' }}>Saran</option>
                                <option value="Pengaduan" {{ old('jenis') == 'Pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
