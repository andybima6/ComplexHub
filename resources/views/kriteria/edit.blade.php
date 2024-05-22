@extends('layouts.welcome')
@section('content')
    <div class="container">
        <h1>Edit Kriteria</h1>

        <form action="{{ route('kriteria.update', $destinasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kriteria">Kriteria</label>
                <input type="text" name="kriteria" class="form-control" value="{{ $kriteria->kriteria }}" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ $kriteria->jenis }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

