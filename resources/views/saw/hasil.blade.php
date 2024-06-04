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
    <nav id="navbar">
        <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
        <a href="{{ url('/kriteria') }}">Kriteria</a>
        <a href="{{ url('/alternatif') }}">Alternatif</a>
        <a href="{{ url('/penilaian') }}">Penilaian</a>
        <a href="{{ url('/saw') }}">Ranking</a>
    </nav>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28 mb-10">
          <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
            Tabel Normalisasi :
          </p>
          <p>Masing-masing alternatif dihitung dengan menjumlahkan produk antara nilai yang telah dinormalisasi dan bobot dari setiap kriteria.</p>
        <!-- Tabel Normalisasi -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alternatif</th>
                    @foreach($kriterias as $kriteria)
                        <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifs as $alternatif)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->nama }}</td>
                        @foreach($kriterias as $kriteria)
                            <td>{{ number_format($nilaiNormalisasi[$alternatif->id][$kriteria->id], 2) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28 mb-10">
          <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
            Tabel Hasil Akhir :
          </p>
          <p>Hasil dibawah ini hanyalah sistem pendukung keputusan, keputusan akhir tetap di Anda!</p>
        <!-- Tabel Hasil SAW -->
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
        </div>

    </div>
</main>
@endsection
