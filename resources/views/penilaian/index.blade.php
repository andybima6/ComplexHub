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

    /* Responsive styles */
    @media screen and (max-width: 600px) {
        table {
            width: 100%;
            margin: 10px auto;
            overflow-x: auto;
        }

        #navbar a {
            display: block;
            padding: 10px 0;
            font-size: 18px;
        }

        .btn {
            padding: 8px 16px;
            font-size: 14px;
        }
    }

    .relative {
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}
</style>

<main class="mx-auto contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div style="height: 110px;"></div>
        <nav id="navbar">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
            <a href="{{ url('/kriteria') }}">Kriteria</a>
            <a href="{{ url('/alternatif') }}">Alternatif</a>
            <a href="{{ url('/penilaian') }}">Penilaian</a>
            <a href="{{ url('/saw') }}">Ranking</a>
        </nav>

        <div class="relative overflow-x-auto bg-white" style="max-width: 95%;">
            <p class="mb-6 sm:mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
            Penilaian Matriks Keputusan :
        </p>

        <a href="{{ route('penilaian.create') }}" class="btn btn-primary">Isi Penilaian</a>

        <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200" style="align-items:center">
            <thead class="text-xs uppercase bg-gray-50 text-gray-700">
                <tr>
                <th scope="col" class="px-6 py-3 border-b border-gray-200">No</th>
                <th scope="col" class="px-6 py-3 border-b border-gray-200">Nama Alternatif</th>
                @foreach($kriterias as $kriteria)
                    <th scope="col" class="px-6 py-3 border-b border-gray-200">{{ $kriteria->nama }}</th>
                @endforeach
                <th scope="col" class="px-6 py-3 border-b border-gray-200">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alternatifs as $alternatif)
            <tr class="bg-white border-b border-gray-200">
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $alternatif->nama }}</td>
                    @foreach($kriterias as $kriteria)
                        <td>{{ $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? '0' }}</td>
                    @endforeach
                    <td>
                        <a href="{{ route('penilaian.edit', $alternatif->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
