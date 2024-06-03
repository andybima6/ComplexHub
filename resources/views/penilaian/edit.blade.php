@extends('layouts.welcome')

@section('content')
<div class="container">
    <h1>Edit Penilaian</h1>
    <form action="{{ route('penilaian.update', $alternatif->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Alternatif:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $alternatif->nama }}" readonly>
        </div>

        @foreach($kriterias as $kriteria)
        <div class="form-group">
            <label for="nilai_{{ $kriteria->id }}">{{ $kriteria->nama }}:</label>
            <input type="number" class="form-control" id="nilai_{{ $kriteria->id }}" name="nilai[{{ $kriteria->id }}]" value="{{ $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? '' }}" required>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
