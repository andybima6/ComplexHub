@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Data RT</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $dataRt->id }}</p>
                    <p><strong>Nama:</strong> {{ $dataRt->nama }}</p>
                    <p><strong>Nomor RT:</strong> {{ $dataRt->rt }}</p>
                    <p><strong>Periode Awal:</strong> {{ $dataRt->periode_awal }}</p>
                    <p><strong>Periode Akhir:</strong> {{ $dataRt->periode_akhir }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
