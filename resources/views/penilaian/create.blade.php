@extends('layouts.welcome')

@section('content')

<style>
    /* Table styles */
    table {
      border-collapse: collapse;
      width: 100%;
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

    /* Button styles */
    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn-primary {
      background-color: #007bff;
      color: #fff;
    }

    .btn-warning {
      background-color: #ffc107;
      color: #212529;
    }
  </style>

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
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
            Tabel Pengukuran :
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Kriteria</th>
                    <th>Jenis Kriteria</th>
                    <th>Pengukuran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Biaya tiket masuk</td>
                    <td>Cost</td>
                    <td>1-3 = Rp 100.000 - Rp 300.000 <br>
                        4-6 = Rp 50.000 - Rp90.000<br>
                        7-10 = Rp 0 - 49.000
                    </td>
                </tr>
                <tr>
                    <td>Fasilitas</td>
                    <td>Benefit</td>
                    <td>1-3 sedikit, <br>
                        4-6 standard, <br>
                        7-10 lengkap
                    </td>
                </tr>
                <tr>
                    <td>Kebersihan</td>
                    <td>Benefit</td>
                    <td>1-3 sedikit, <br>
                        4-6 standard, <br>
                        7-10 lengkap
                    </td>
                </tr>
                <tr>
                    <td>Keamanan</td>
                    <td>Benefit</td>
                    <td>1-3 sedikit, <br>
                        4-6 standard, <br>
                        7-10 lengkap
                    </td>
                </tr>
                <tr>
                    <td>Biaya akomodasi</td>
                    <td>Cost</td>
                    <td>1-3 = Rp 100.000 - Rp 300.000 <br>
                        4-6 = Rp 50.000 - Rp90.000<br>
                        7-10 = Rp 0 - 49.000
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    

    <div class="rounded-md relative p-16 top-24 left-16 bg-white mr-28 mb-10">
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
             Pengisian Penilaian Matriks Keputusan :
        </p>
    <form action="{{ route('penilaian.store') }}" method="POST">
        @csrf
        
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Alternatif</th>
                    @foreach($kriterias as $kriteria)
                        <th>{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifs as $alternatif)
                <tr>
                    <td>{{ $alternatif->nama }}</td>
                    @foreach($kriterias as $kriteria)
                        <td>
                            <input type="number" name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]" class="form-control" step="1" min="1" max="10" required>
                        </td>                        
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>        
</div>
</main>
@endsection
