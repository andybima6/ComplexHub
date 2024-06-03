@extends('layouts.welcome')

@section('content')
<div class="container">
    <h1>Tambah Penilaian</h1>
    <form action="{{ route('penilaian.store') }}" method="POST">
        @csrf
        
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Alternatif</th>
                    @foreach($kriterias as $kriteria)
                        <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nama }}</td>
                    @foreach($kriterias as $kriteria)
                        <td>
                            <input type="number" name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]" class="form-control" step="0.01" required>
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>        
</div>
@endsection
