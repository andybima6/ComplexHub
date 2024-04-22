@extends('layouts.welcome')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
            <div class="rounded-md relative p-16 top-0 left-16 bg-white mr-28">
                <div class="mb-3">
                    <a href="{{ route('kk.index') }}" class="btn btn-secondary mb-5">Kembali</a>
                </div>
                <p class="mb-10" style="font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Detail Data KK :</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" class="border px-2 py-1 text-center" style="width: 16.666%;">Kepala Keluarga</th>
                                <td class="border px-4 py-2">{{ $kk->kepala_keluarga }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="border px-2 py-1 text-center" style="width: 16.666%;">Nomor KK</th>
                                <td class="border px-4 py-2">{{ $kk->no_kk }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="border px-2 py-1 text-center" style="width: 16.666%;">Status Ekonomi</th>
                                <td class="border px-4 py-2">{{ $kk->status_ekonomi }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="border px-2 py-1 text-center" style="width: 16.666%;">Foto Kartu Keluarga</th>
                                <td class="border px-4 py-2"><img src="{{ asset('storage/' . $kk->image) }}" alt="Foto KK" class="img-fluid"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
