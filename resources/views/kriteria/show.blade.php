{{-- @extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4">
            <h2 class="text-2xl font-semibold">Kriteria Detail</h2>
            <a href="{{ route('kriteria/kriteriadestinasiRW') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $kriteria->id }}</p>
            <p><strong>Nama:</strong> {{ $kriteria->nama }}</p>
            <p><strong>Jenis:</strong> {{ $kriteria->jenis }}</p>
        </div>
    </div>
</main>
@endsection --}}



@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Detail Kriteria</h3>
            <a href="{{ route('kriteria/kriteriadestinasiRW') }}" class="btn btn-secondary float-end">Kembali</a>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p class="card-text mb-1"><strong>ID:</strong>{{ $kriteria->id }}</h5>
                <p class="card-text mb-1"><strong>Nama:</strong> {{ $kriteria->nama }}</p>
                <p class="card-text mb-1"><strong>Jenis:</strong> {{ $kriteria->jenis }}</p>
            </div>

            <h5 class="mb-3">Bobot</h5>
            <a href="{{ route('kriteria.create_bobot', $kriteria->id) }}" class="btn btn-primary mb-3">Tambah Bobot Kriteria</a>
            @if(count($bobot) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Bobot</th></th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bobot as $bobot)
                        <tr>
                            <td>{{ $bobot->bobot }}</td>
                            <td>
                                <a href="{{ route('editAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form action="{{ route('destroyAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus bobot ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info" role="alert">
                Belum ada Bobot.
            </div>
            @endif
        </div>
    </div>
</main>
@endsection
