@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md mx-auto p-16" style="background-color: white; width: 500px;">
        <div class="card-header mb-4 text-center">
            <h2 class="text-2xl font-semibold">Tambah Data RT</h2>
            <a href="{{ route('rts.index') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('rts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" name="rt" class="form-control" id="rt" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telefon" class="form-label">Nomor Telefon</label>
                    <input type="text" name="nomor_telefon" class="form-control" id="nomor_telefon" required>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
