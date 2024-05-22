@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4 flex justify-between items-center">
            <h2 class="text-2xl font-semibold">Tambah Kartu Keluarga</h2>
            <a href="{{ route('data_kartu_keluargas.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('data_kartu_keluargas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
                    <input type="text" name="kepala_keluarga" id="kepala_keluarga" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="no_kk" class="form-label">No KK</label>
                    <input type="text" name="no_kk" id="no_kk" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="rt_id" class="form-label">RT</label>
                    <select name="rt_id" id="rt_id" class="form-control" required>
                        @foreach($rts as $rt)
                            <option value="{{ $rt->id }}">{{ $rt->rt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="status_ekonomi" class="form-label">Status Ekonomi</label>
                    <select name="status_ekonomi" id="status_ekonomi" class="form-control" required>
                        <option value="mampu">Mampu</option>
                        <option value="tidak mampu">Tidak Mampu</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="foto_kartu_keluarga" class="form-label">Foto Kartu Keluarga</label>
                    <input type="file" name="foto_kartu_keluarga" id="foto_kartu_keluarga" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</main>
@endsection
