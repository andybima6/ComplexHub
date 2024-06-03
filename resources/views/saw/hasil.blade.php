@extends('layouts.welcome')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan SAW</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Hasil Perhitungan SAW</h1>
    <table>
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Alternatif</th>
                <th>Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            @php
                $ranking = 1;
            @endphp
            @foreach($skor as $alternatif_id => $nilai)
            @php
                $alternatif = $alternatifs->find($alternatif_id);
            @endphp
            <tr>
                <td>{{ $ranking++ }}</td>
                <td>{{ $alternatif->nama }}</td>
                <td>{{ $nilai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection