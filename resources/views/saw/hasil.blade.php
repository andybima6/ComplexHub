@extends('layouts.welcome')

@section('content')

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

    <!-- Tabel Normalisasi -->
    <div class="relative overflow-x-auto bg-white" style="max-width: 95%;border-radius:10px;">
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F; margin-left:50px;">
            Tabel Normalisasi :
        </p>
        <p style="margin-left:50px;">Masing-masing alternatif dihitung dengan menjumlahkan produk antara nilai yang telah dinormalisasi dan bobot dari setiap kriteria.</p>
        
        <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200" style="align-items:center; max-width:90%">
            <thead class="text-xs uppercase bg-gray-50 text-gray-700">
                <tr>
                     <th scope="col" class="px-6 py-3 border-b border-gray-200">No</th>
                     <th scope="col" class="px-6 py-3 border-b border-gray-200">Nama Alternatif</th>
                    @foreach($kriterias as $kriteria)
                         <th scope="col" class="px-6 py-3 border-b border-gray-200">{{ $kriteria->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifs as $alternatif)
                <tr class="bg-white border-b border-gray-200">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-black">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-black">{{ $alternatif->nama }}</td>
                        @foreach($kriterias as $kriteria)
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-black">{{ number_format($nilaiNormalisasi[$alternatif->id][$kriteria->id], 2) }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <br><br><br>
    <!-- Tabel Hasil SAW -->
    <div class="relative overflow-x-auto bg-white" style="max-width: 95%;border-radius:10px;">
        <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F; margin-left:50px;">
            Tabel Hasil Akhir :
        </p>
        <p style="margin-left:50px;">Hasil dibawah ini hanyalah sistem pendukung keputusan, keputusan akhir tetap di Anda!</p>
        
        <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200" style="align-items:center; max-width:90%">
            <thead class="text-xs uppercase bg-gray-50 text-gray-700">
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

</main>
@endsection
