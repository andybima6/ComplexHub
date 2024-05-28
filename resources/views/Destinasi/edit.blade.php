@extends('layouts.welcome')
@section('content')
    <div class="container">
        <h1>Edit Alternatif</h1>

        <form action="{{ route('alternatif.update', $destinasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama wisata">Nama wisata</label>
                <input type="text" name="nama wisata" class="form-control" value="{{ $alternatif->alternatif }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

