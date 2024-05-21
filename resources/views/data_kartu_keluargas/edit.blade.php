@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
        <div class="card-header">Edit Kartu Keluarga</div>
        <div class="card-body">
            <form action="{{ route('data_kartu_keluargas.update', $dataKartuKeluarga->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kepala_keluarga">Kepala Keluarga</label>
                    <input type="text" name="kepala_keluarga" class="form-control" value="{{ $dataKartuKeluarga->kepala_keluarga }}" required>
                </div>
                <div class="form-group">
                    <label for="no_kk">No KK</label>
                    <input type="text" name="no_kk" class="form-control" value="{{ $dataKartuKeluarga->no_kk }}" required>
                </div>
                <div class="form-group">
                    <label for="rt_id">RT</label>
                    <select name="rt_id" class="form-control" required>
                        @foreach($rts as $rt)
                            <option value="{{ $rt->id }}" {{ $rt->id == $dataKartuKeluarga->rt_id ? 'selected' : '' }}>{{ $rt->rt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_ekonomi">Status Ekonomi</label>
                    <select name="status_ekonomi" class="form-control" required>
                        <option value="mampu" {{ $dataKartuKeluarga->status_ekonomi == 'mampu' ? 'selected' : '' }}>Mampu</option>
                        <option value="tidak mampu" {{ $dataKartuKeluarga->status_ekonomi == 'tidak mampu' ? 'selected' : '' }}>Tidak Mampu</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</main>
@endsection
