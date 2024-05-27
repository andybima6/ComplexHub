@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Penilaian</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="alternative_id">Alternatif</label>
            <select name="alternative_id" id="alternative_id" class="form-control">
                @foreach($alternatives as $alternative)
                    <option value="{{ $alternative->id }}" {{ $alternative->id == $penilaian->alternative_id ? 'selected' : '' }}>
                        {{ $alternative->alternatif }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="form-control" value="{{ $penilaian->bobot }}">
        </div>

        <div class="form-group">
            <label for="biaya_tiket_masuk">Biaya Tiket Masuk</label>
            <input type="text" name="biaya_tiket_masuk" id="biaya_tiket_masuk" class="form-control" value="{{ $penilaian->biaya_tiket_masuk }}">
        </div>

        <div class="form-group">
            <label for="fasilitas">Fasilitas</label>
            <input type="text" name="fasilitas" id="fasilitas" class="form-control" value="{{ $penilaian->fasilitas }}">
        </div>

        <div class="form-group">
            <label for="kebersihan">Kebersihan</label>
            <input type="text" name="kebersihan" id="kebersihan" class="form-control" value="{{ $penilaian->kebersihan }}">
        </div>

        <div class="form-group">
            <label for="keamanan">Keamanan</label>
            <input type="text" name="keamanan" id="keamanan" class="form-control" value="{{ $penilaian->keamanan }}">
        </div>

        <div class="form-group">
            <label for="biaya_akomodasi">Biaya Akomodasi</label>
            <input type="text" name="biaya_akomodasi" id="biaya_akomodasi" class="form-control" value="{{ $penilaian->biaya_akomodasi }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
