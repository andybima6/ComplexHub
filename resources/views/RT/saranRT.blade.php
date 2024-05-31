@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
        style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
        <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
            style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
            Total Pengaduan :
        <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
            style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
            <div class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                {{ str_pad(count($suggestions), 2, '0', STR_PAD_LEFT) }}
            </div>
        </div>
        </p>
    </div>
    </div>
        <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
            <p class="mb-10"  style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Daftar Saran dan Pengaduan RT:</p>
            <hr class="mb-6">
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">No</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Tanggal</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Hal yang diadukan</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Bidang</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Isi Laporan</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($suggestions as $index => $suggestion)
                        <tr data-id="{{ $suggestion->id }}">
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}
                            </td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $suggestion->tanggal }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $suggestion->name }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $suggestion->field }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $suggestion->Laporan }}</td>
                            <td class="border px-4 py-2 text-center" style="color: black">{{ $suggestion->status }}</td>

                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('detailSaranRW', ['id' => $suggestion->id]) }}">
                                        <button style="width:45px;height:34px;border-radius:10px;background-color:#2F80ED">
                                            <svg style="margin-left: 10px;margin-top:2px" width="25" height="24"
                                                viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.5 3H21.5V9" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.5 21H3.5V15" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M21.5 3L14.5 10" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M3.5 21L10.5 14" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </a>
                                    <!-- Form untuk menolak kegiatan -->
                                    <form action="{{ route('rejectSaranRT', ['id' => $suggestion->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                            <svg style="margin-left: 10px;margin-top:2px" width="25" height="24"
                                                viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>

                                    <!-- Form untuk menerima kegiatan -->
                                    <form action="{{ route('accSaranRT', ['id' => $suggestion->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            style="width:45px;height:34px;border-radius:10px;background-color:#27AE60">
                                            <svg style="margin-left: 12px;margin-top:2px" width="19" height="13"
                                                viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>


                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
@endsection
