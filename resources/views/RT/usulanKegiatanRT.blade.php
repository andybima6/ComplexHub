@extends('layouts.welcome')

@section('content')
    {{-- Content --}}
    <main class="mx-auto p-6 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="opsi flex flex-col md:flex-row md:justify-between mt-8 md:mt-0" style="">
            <div class="md:w-full h-64 md:h-auto rounded-md md:mx-0 mt-4 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); margin-right: 10px;">
                <p class="values text-center md:text-left" style="font-size: 28px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                    <span class="block md:inline-block" style="font-size: 80px;">01</span>
                </p>
            </div>
            <div class="md:w-full h-64 md:h-auto rounded-md md:mx-0 mt-8 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); margin-left: 10px;">
                <p class="text-center md:text-left" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total Kegiatan :
                    <span class="block md:inline-block" style="font-size: 80px;">{{ str_pad(count($activities), 2, '0', STR_PAD_LEFT) }}</span>
                </p>
            </div>
        </div>
        

        <div class="rounded-md relative p-6 md:p-16 mt-8 bg-white">
            <p class="mb-6" style="font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Daftar Izin Kegiatan RT :</p>
            <div class="overflow-x-auto">
                <table class="w-full table-fixed">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/6">No</th>
                            <th class="border px-4 py-2 text-center w-1/6">Nama Kegiatan</th>
                            <th class="border px-4 py-2 text-center w-1/6">Keterangan</th>
                            <th class="border px-4 py-2 text-center w-1/6">Document</th>
                            <th class="border px-4 py-2 text-center w-1/6">Status</th>
                            <th class="border px-4 py-2 text-center w-1/6">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $index => $activity)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2 text-center">{{ $activity->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $activity->description }}</td>
                                <td class="border px-4 py-2 text-center">
                                    @if ($activity->document)
                                        <a href="{{ $activity->document }}" target="_blank" rel="noopener noreferrer" class="flex justify-center items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-5 h-5 fill-red-500">
                                                <path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z" />
                                            </svg>
                                            Lihat dokumen
                                        </a>
                                    @else
                                        Tidak Ada File
                                    @endif
                                </td>
                                <td class="border px-4 py-2 text-center">{{ $activity->status }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('detailKegiatanRT', ['id' => $activity->id]) }}">
                                            <button class="rounded-md py-1 px-2 bg-blue-500 text-white">
                                                Detail
                                            </button>
                                        </a>
                                        <!-- Form untuk menolak kegiatan -->
                                        <form action="{{ route('rejectKegiatanRT', ['id' => $activity->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="rounded-md py-1 px-2 bg-red-500 text-white">
                                                Tolak
                                            </button>
                                        </form>

                                        <!-- Form untuk menerima kegiatan -->
                                        <form action="{{ route('accKegiatanRT', ['id' => $activity->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="rounded-md py-1 px-2 bg-green-500 text-white">
                                                Terima
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
