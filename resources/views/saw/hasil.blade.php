@extends('layouts.welcome')

@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Perhitungan SAW</title>
  <style>
    /* Table styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px auto;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

  </style>
</head>
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Navbar, Tabel</title>
            <style>
                #navbar {
                    text-align: center;
                }
                #navbar a {
                    display: inline-block;
                    padding: 10px 20px;
                    text-decoration: none;
                    font-size: 24px;
                    font-weight: 600;
                }
            </style>
        </head>
        <body>
            <nav id="navbar">
                <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
                <a href="{{ url('/kriteria') }}">Kriteria</a>
                <a href="{{ url('/alternatif') }}">Alternatif</a>
                <a href="{{ url('/penilaian') }}">Penilaian</a>
                <a href="{{ url('/saw') }}">Ranking</a>
            </nav>
  <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28 mb-10">
    <body>
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F; text-align: center">
            Hasil Perhitungan SAW :
       </p>

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
  </div>
</html>
@endsection
