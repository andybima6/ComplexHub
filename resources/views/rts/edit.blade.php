@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4">
            <h2 class="text-2xl font-semibold">Edit RT</h2>
            <a href="{{ route('rts.index') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('rts.update', $rt->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $rt->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="text" name="rt" class="form-control" value="{{ $rt->rt }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $rt->alamat }}" required>
                </div>
                <div class="form-group">
                    <label for="nomor_telefon">Nomor Telefon</label>
                    <input type="text" name="nomor_telefon" class="form-control" value="{{ $rt->nomor_telefon }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>
@endsection
