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
        
        /* Remove border on the bottom of the table body */
        .table tbody tr:last-child td {
            border-bottom: none;
        }
          
        /* Style for the "Edit" button within the table cell */
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        
        .btn {
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          font-size: 16px;
          cursor: pointer;
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

        .relative {
    position: relative;
    left: 50%;
    transform: translateX(-50%);
}

@media (min-width: 768px) {
    th,td {
        font-size: 18px;
    }
    }
      </style>
    <main class="mx-auto contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div style="height: 110px;"></div>
        <body>
            <nav id="navbar">
                <a href="{{ url('destinasi/RW/destinasiwisataRW') }}">Beranda</a>
                <a href="{{ url('/kriteria') }}">Kriteria</a>
                <a href="{{ url('/alternatif') }}">Alternatif</a>
                <a href="{{ url('/penilaian') }}">Penilaian</a>
                <a href="{{ url('/saw') }}">Ranking</a>
            </nav>
            <div class="relative overflow-x-auto bg-white" style="max-width: 95%;">
                <p class="mb-10"
                    style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">
                    Data Alternatif Destinasi Wisata:
                </p>
                <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200" style="align-items:center">
                    <thead class="text-xs uppercase bg-gray-50 text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-b border-gray-200">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-200">
                                Nama Wisata
                            </th>
                            <th scope="col" class="px-6 py-3 border-b border-gray-200">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatifs as $index => $alternatif)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                {{ $alternatif->nama }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                <a href="{{ route('alternatif.edit', $alternatif->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-200 text-white py-2 px-4 rounded-md hover:text-white">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </body>
        </html>
    </main>
@endsection
