@extends('layouts.welcome')
@section('content')
    <style>
        /* Hide default arrow */
        .custom-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: transparent;
            border: none;
            padding-right: 20px;
            /* Add some padding to avoid text being cut off */
            position: relative;
        }

        .custom-select::after {
            content: '';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #fff;
            /* You can change the color of the arrow here */
            pointer-events: none;
        }
    </style>
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">

            <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total Kegiatan :
                <div id="total-kegiatan" class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                    style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <div class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        {{ str_pad(count($activities), 2, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
                </p>
            </div>


            <div class="md:w-2/5 h-96 rounded-md md:ml-4 mt-4 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :

                <div class="values w-911 h-62 relative md:left-96 top-12 text-center md:text-left"
                    style="font-size: 96px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <div class="w-full md:w-auto">
                        <div class="mb-4">
                            <select id="rt_id" name="rt_id"
                                class="custom-select font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; text-white bg-transparent border-none outline-none"
                                onchange="filterRT()">
                                <option value="">00 </option>
                                @foreach ($rts as $rt)
                                    <option value="{{ $rt->id }}">{{ $rt->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                    </div>
                </div>
                </p>
            </div>

        </div>


        <div class="rounded-md relative p-16 top-32 left-16 bg-white mr-28">
            <p class="mb-10"
                style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #2A424F;">Daftar
                Izin
                Usaha RT :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6">No</th>
                        <th class="border px-4 py-2 text-center w-1/6">Nama Kegiatan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Keterangan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Document</th>
                        <th class="border px-4 py-2 text-center w-1/6">Status</th>
                        <th class="border px-4 py-2 text-center w-1/6">Lingkup</th>
                        <th class="border px-4 py-2 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <tbody id="kegiatan-table">
                    @foreach ($activities as $index => $activity)
                        <tr data-id="{{ $activity->rt_id }}">
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">
                                {{ $index + 1 }}
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
                            <td class="border px-4 py-2 text-center">RT {{ $activity->rt_id }}</td>

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
    <script>
        function filterRT() {
            var selectedRT = document.getElementById('rt_id').value;
            var rows = document.querySelectorAll('#kegiatan-table tr');
            var totalKegiatan = 0;
            for (var i = 0; i < rows.length; i++) { // Mulai dari indeks 1 untuk melewati baris header
                var rtIdCell = rows[i].getAttribute('data-id');
                if (selectedRT === "" || rtIdCell === selectedRT) {
                    rows[i].style.display = "";
                    totalKegiatan++;
                } else {
                    rows[i].style.display = "none";
                }
            }
            // Update total kegiatan
            document.getElementById('total-kegiatan').innerText = totalKegiatan;
        }
    </script>
@endsection
