@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="rounded-md relative p-16 top-40 left-16 bg-white mr-28 overflow-x-auto">
            <p class="mb-10"  style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Daftar Izin Usaha RT :</p>
            <hr class="mb-6">
            {{-- <p class="mb-6" style="font-size: 18px; font-family: 'Poppins', sans-serif; font-weight: 500; color: black;">{{ $breadcrumb->subtitle }}</p> --}}
            <table class="md:table-fixed w-full">
                <thead>
                    <tr class="bg-gray-200 text-black font-medium text-center">
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">No</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Warga</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Usaha</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Deskripsi</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Foto Produk</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($izinUsaha as $index => $izin)
                    <tr>
                        <td class="border px-4 py-2 text-center" style="color: black" data-number="{{ $index + 1 }}">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_warga }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_usaha }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->deskripsi }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">
                            <div class="flex justify-center">
                                <img style="padding-right: 45%" src="{{ asset('storage/' . $izin->foto_produk) }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center" style="color: black">
                            <div class="flex justify-center items-center gap-2">
                            <a href="{{ route('detailIzinUsahaRT', ['id' => $izin->id]) }}">
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
                        <form action="{{ route('tolakIzinRT', ['id' => $izin->id]) }}" method="POST">
                            @csrf
                            <button type="submit" style="width:45px;height:34px;border-radius:10px;background-color:#EB5757">
                                <svg style="margin-left: 10px;margin-top:2px" width="25" height="24"
                                        viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.5 6L6.5 18" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.5 6L18.5 18" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                        <form action="{{ route('accIzinRT', ['id' => $izin->id]) }}" method="POST">
                            @csrf
                            <button type="submit" style="width:45px;height:34px;border-radius:10px;background-color:#27AE60">
                                <svg style="margin-left: 12px;margin-top:2px" width="19" height="13"
                                    viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 1L6.5 12L1.5 7" stroke="white" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
