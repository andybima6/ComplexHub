@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Tambah Alternatif</h2>
            <a href="{{ route('alternatif.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('Destinasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="ID" class="form-label">ID</label>
                    <input type="text" name="ID" id="ID" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama wisata</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</main>
@endsection
