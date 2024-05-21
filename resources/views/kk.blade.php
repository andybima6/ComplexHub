@extends('layouts.welcome')

    @section('title', 'Data KK')
    
    @section('content')
    <div class="container">
        <h1>Data KK</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama KK</th>
                    <th>Alamat</th>
                    <th>Jumlah Anggota</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>KK 001</td>
                    <td>Jalan Baru 456</td>
                    <td>4</td>
                </tr>
                <!-- Tambahkan baris sesuai dengan data KK yang ada -->
            </tbody>
        </table>
    </div>
    @endsection