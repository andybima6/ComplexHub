@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
            <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <div class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        01
                        <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                    </div>
                </div>
                </p>
            </div>
            <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total Kegiatan :
                <div class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <div class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        03
                    </div>
                </div>
                </p>
            </div>
        </div>




        <div class="rounded-md relative p-16 top-32 left-16 bg-white mr-28">
            <p class="mb-10"
                style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Daftar Izin
                Usaha RT :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6">No</th>
                        <th class="border px-4 py-2 text-center w-1/6">Nama Kegiatan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Keterangan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Document</th>
                        <th class="border px-4 py-2 text-center w-1/6">Comment</th>
                        <th class="border px-4 py-2 text-center w-1/6">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $index => $activity)
                        <tr data-id="{{ $activity->id }}">
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $activity->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $activity->description }}</td>
                            <td class="border px-4 py-2 text-center">
                                @if ($activity->document)
                                    <a href="{{ $activity->document }}" target="_blank" rel="noopener noreferrer"
                                        class="flex justify-center items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                            class="w-5 h-5 fill-red-500">
                                            <path
                                                d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z" />
                                        </svg>
                                        Lihat dokumen
                                    </a>
                                @else
                                    Tidak Ada File
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $activity->status }}</td>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('detailKegiatanRW', ['id' => $activity->id]) }}">
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
                                    <form action="{{ route('rejectKegiatanRW', ['id' => $activity->id]) }}" method="POST">
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
                                    <form action="{{ route('accKegiatanRW', ['id' => $activity->id]) }}" method="POST">
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

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
