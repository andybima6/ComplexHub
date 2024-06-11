@extends('layouts.welcome')

@section('content')
    <style>
        /* Center the container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Center the form */
        .row {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        /* Style the table */
        table {
            border-collapse: collapse;
            width: 150%;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Form styles */
        form {
            margin-top: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"],
        a.btn-secondary {
            background-color: #007BFF;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
        }

        a.btn-secondary {
            background-color: #6c757d;
        }

        .text-center {
            text-align: center;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <form action="{{ route('penilaian.update', $alternatif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Alternatif:</label>
                        <input type="text" class="form-control-plaintext" id="nama" name="nama" value="{{ $alternatif->nama }}" readonly>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Kriteria</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kriterias as $kriteria)
                            <tr>
                                <td>{{ $kriteria->nama }}</td>
                                <td>
                                    <input type="number" class="form-control" id="nilai_{{ $kriteria->id }}" name="nilai[{{ $kriteria->id }}]" value="{{ $alternatif->nilaiKriteria->where('kriteria_id', $kriteria->id)->first()->nilai ?? '' }}" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
