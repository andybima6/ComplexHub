@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <div class="card-header">
            Detail Kartu Keluarga
            <a href="{{ route('data_kartu_keluargas.index') }}" class="btn btn-secondary float-end">Kembali</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $dataKartuKeluarga->kepala_keluarga }}</h5>
            <p class="card-text">No KK: {{ $dataKartuKeluarga->no_kk }}</p>
            <p class="card-text">RT: {{ $dataKartuKeluarga->rt->rt }}</p>
            <p class="card-text">Status Ekonomi: {{ $dataKartuKeluarga->status_ekonomi }}</p>

            <h5 class="mt-4">Anggota Keluarga</h5>
            <a href="{{ route('data_kartu_keluargas.create_anggota', $dataKartuKeluarga->id) }}" class="btn btn-primary mb-3">Tambah Anggota Keluarga</a>
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
                        @forelse($anggotaKeluargas as $anggota)
                            <tr>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->hubungan_keluarga }}</td>
                                <td>
                                    <a href="{{ route('editAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('destroyAnggota', ['dataKartuKeluarga' => $dataKartuKeluarga->id, 'anggotaKeluarga' => $anggota->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota keluarga ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada anggota keluarga.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
