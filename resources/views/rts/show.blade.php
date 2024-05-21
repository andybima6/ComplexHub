@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white;">
        <div class="card-header mb-4">
            <h2 class="text-2xl font-semibold">RT Detail</h2>
            <a href="{{ route('rts.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $rt->id }}</p>
            <p><strong>Nama:</strong> {{ $rt->nama }}</p>
            <p><strong>RT:</strong> {{ $rt->rt }}</p>
            <p><strong>Alamat:</strong> {{ $rt->alamat }}</p>
            <p><strong>Nomor Telefon:</strong> {{ $rt->nomor_telefon }}</p>
        </div>
    </div>
</main>
@endsection
