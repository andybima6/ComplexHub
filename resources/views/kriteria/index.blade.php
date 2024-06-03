@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kriteria</h1>
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kriterias as $kriteria)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kriteria->nama }}</td>
                <td>{{ $kriteria->jenis }}</td>
                <td>{{ $kriteria->bobot }}</td>
                <td>
                    <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" style="display:inline-block;">
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
