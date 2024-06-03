@extends('layouts.welcome')

@section('content')
<div class="container">
    <h1>Penilaian</h1>
    <a href="{{ route('penilaian.create') }}" class="btn btn-primary">Tambah Penilaian</a>
    
    <!-- Form untuk tombol "Hitung SAW" ditempatkan di luar tabel -->
    <form action="{{ route('penilaian.calculate_saw') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Hitung SAW</button>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                @foreach($kriterias as $kriteria)
                    <th>{{ $kriteria->nama }}</th>
                @endforeach
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alternatifs as $alternatif)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $alternatif->nama }}</td>
                @foreach($kriterias as $kriteria)
                    <td>{{ $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? 'N/A' }}</td>
                @endforeach
                <td>
                    <a href="{{ route('penilaian.edit', $alternatif->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>       
    </table>
</div>
@endsection
