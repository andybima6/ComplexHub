@extends('layouts.welcome')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
            <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28">
                <h2 class="mb-10" style="font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Edit Data KK</h2>
                <form action="{{ route('kk.update', $kk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="kepala_keluarga">Kepala Keluarga</label>
                        <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga" value="{{ $kk->kepala_keluarga }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_kk">Nomor KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $kk->no_kk }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="status_ekonomi">Status Ekonomi</label>
                        <select class="form-control" id="status_ekonomi" name="status_ekonomi">
                            <option value="Mampu" {{ $kk->status_ekonomi == 'Mampu' ? 'selected' : '' }}>Mampu</option>
                            <option value="Tidak Mampu" {{ $kk->status_ekonomi == 'Tidak Mampu' ? 'selected' : '' }}>Tidak Mampu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                        <a href="{{ route('kk.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
