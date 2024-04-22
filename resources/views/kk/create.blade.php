@extends('layouts.welcome')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
            <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28 border">
                <h2 class="mb-5 text-center" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Tambah KK Baru</h2>
                <form action="{{ route('kk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
                        <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="no_kk" class="form-label">Nomor KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk">
                    </div>
                    <div class="mb-3">
                        <label for="status_ekonomi" class="form-label">Status Ekonomi</label>
                        <select class="form-control" id="status_ekonomi" name="status_ekonomi">
                            <option value="Mampu">Mampu</option>
                            <option value="Tidak Mampu">Tidak Mampu</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
