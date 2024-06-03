@extends('layouts.welcome')

@section('content')
<div class="container">
    <h1>Alternatif</h1>
    <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah Alternatif</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alternatifs as $alternatif)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $alternatif->nama }}</td>
                <td>
                    <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
