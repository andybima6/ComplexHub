@extends('layouts.welcome')

@section('content')
<div class="container">
    <h1>Tambah Alternatif</h1>
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
