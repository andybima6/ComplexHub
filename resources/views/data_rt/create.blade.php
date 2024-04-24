@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
        <div class="card-body md:w-2/5 rounded-md mx-auto"> <!-- Menambahkan kelas mx-auto di sini -->
            <form method="POST" action="{{ route('data_rt.store') }}">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rt">Nomor RT</label>
                    <input type="text" name="rt" id="rt" class="form-control">
                </div>

                <div class="form-group">
                    <label for="periode_awal">Periode Awal</label>
                    <input type="text" name="periode_awal" id="periode_awal" class="form-control">
                </div>

                <div class="form-group">
                    <label for="periode_akhir">Periode Akhir</label>
                    <input type="text" name="periode_akhir" id="periode_akhir" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</main>
@endsection
