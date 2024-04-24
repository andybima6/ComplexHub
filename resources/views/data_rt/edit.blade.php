@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data RT</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('data_rt.update', $dataRt->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $dataRt->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="rt">Nomor RT</label>
                            <input type="text" name="rt" id="rt" class="form-control" value="{{ $dataRt->rt }}">
                        </div>

                        <div class="form-group">
                            <label for="periode_awal">Periode Awal</label>
                            <input type="text" name="periode_awal" id="periode_awal" class="form-control" value="{{ $dataRt->periode_awal }}">
                        </div>

                        <div class="form-group">
                            <label for="periode_akhir">Periode Akhir</label>
                            <input type="text" name="periode_akhir" id="periode_akhir" class="form-control" value="{{ $dataRt->periode_akhir }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
