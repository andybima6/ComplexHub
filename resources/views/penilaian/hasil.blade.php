@extends('layouts.welcome')

@section('content')
<div class="container">
    <h1>Hasil Penilaian</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Alternatif</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skor as $alternatif_id => $nilai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $alternatifs->find($alternatif_id)->nama }}</td>
                    <td>{{ $nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
