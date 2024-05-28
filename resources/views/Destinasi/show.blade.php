@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4">
            <h2 class="text-2xl font-semibold">Alternatif Detail</h2>
            <a href="{{ route('kriteria/kriteriadestinasiRW') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $alternatif->id }}</p>
            <p><strong>Nama wisata:</strong> {{ $alternatif->namawisata }}</p>
        </div>
    </div>
</main>
@endsection
