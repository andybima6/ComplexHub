@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <div class="card-header">
            <h3 class="text-lg font-semibold">Kartu Keluarga</h3>
            <a href="{{ route('data_kartu_keluargas.index') }}" class="btn btn-secondary float-end">Kembali</a>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p class="card-text mb-1"><strong>Nama Kepala Keluarga:</strong>{{ $dataKartuKeluarga->kepala_keluarga }}</h5>
                <p class="card-text mb-1"><strong>No KK:</strong> {{ $dataKartuKeluarga->no_kk }}</p>
                <p class="card-text mb-1"><strong>RT:</strong> {{ $dataKartuKeluarga->rt->rt }}</p>
                <p class="card-text mb-1"><strong>Status Ekonomi:</strong> {{ $dataKartuKeluarga->status_ekonomi }}</p>
            </div>

            <h5 class="mb-3">Anggota Keluarga</h5>
            <a href="{{ route('data_kartu_keluargas.create_anggota', $dataKartuKeluarga->id) }}" class="btn btn-primary mb-3">Tambah Anggota Keluarga</a>
            @if(count($anggotaKeluargas) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Hubungan Keluarga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggotaKeluargas as $anggota)
                        <tr>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->hubungan_keluarga }}</td>
                            <td>
                                <a href="{{ route('editAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form action="{{ route('destroyAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota keluarga ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info" role="alert">
                Belum ada anggota keluarga.
            </div>
            @endif
        </div>
    </div>
</main>
@endsection
