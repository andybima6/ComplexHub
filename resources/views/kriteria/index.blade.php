@extends('layouts.welcome')

@section('content')
    {{-- Tampilkan pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Content --}}
    <style>

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
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
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Remove border on the bottom of the table body */

        /* Style for the "Edit" button within the table cell */
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        #table {
          margin-top: 20px;
        }
        /* Responsive styles */
        @media (max-width: 640px) {
            table {
                font-size: 14px;
            }
            .btn-warning {
                padding: 8px 16px;
                font-size: 14px;
            }
        }

            #navbar {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
            }
            #navbar a {
                padding: 10px 20px;
                text-decoration: none;
                font-size: 24px;
                font-weight: 600;
                color: #000;
                transition: color 0.3s;
            }
            #navbar a:hover {
                color: #007BFF;
            }

    </style>

    <main class="mx-auto p-8 sm:p-16 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">

        <nav id="navbar">
            <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
            <a href="{{ url('/kriteria') }}">Kriteria</a>
            <a href="{{ url('/alternatif') }}">Alternatif</a>
            <a href="{{ url('/penilaian') }}">Penilaian</a>
            <a href="{{ url('/saw') }}">Ranking</a>
        </nav>


        <div class="rounded-md relative p-8 md:p-16 bg-white mr-4 md:mr-28">
            <p class="mb-6" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                Data Kriteria Destinasi Wisata:
            </p>

            <div id="table" class="overflow-x-auto mx-auto">
              <table class="w-full table m-0">
                  <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Kriteria</th>
                          <th class="text-center">Jenis</th>
                          <th class="text-center">Bobot</th>
                          <th class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($kriterias as $index => $kriteria)
                          <tr>
                              <td class="text-center">{{ $index + 1 }}</td>
                              <td class="text-center">{{ $kriteria->nama }}</td>
                              <td class="text-center">{{ $kriteria->jenis }}</td>
                              <td class="text-center">{{ $kriteria->bobot }}</td>
                              <td class="text-center">
                                  <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="btn btn-warning">Edit</a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>


        </div>
    </main>
@endsection
