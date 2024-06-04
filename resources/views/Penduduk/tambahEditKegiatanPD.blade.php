@extends('layouts.welcome')

@section('content')
    <main style="overflow-y: auto; min-height: 100vh;">
        <div class="md:justify-between mt-20 py-24 flex">
            <div class="md:ml-52 mt-4 md:mt-0 relative"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width:350px;height:275px;border-radius:13px">
                <p class="relative md:right-24 top-6 text-center md:text-left;"
                    style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                <div class="values w-911 h-62 relative md:left-32 top-2 text-center md:text-left"
                    style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <a class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        01
                    </a>
                </div>
                </p>
            </div>


            <div id="openModal" class="flex relative w-96 top-24 right-0 items-center justify-center mr-64"
                style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
                <p style="font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300;">
                    + Tambah
                </p>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <form method="POST" action="{{ route('tambahKegiatanPD') }}" enctype="multipart/form-data"
                    class="modal-content absolute inset-0 mt-56"
                    style="background-color:#FFFFFF;border-radius:15px;z-indeks:9999;">
                    @csrf
                    <span id="closeModal" class="close">&times;</span>
                    <div class="relative  w-fit py-2 "
                        style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                        Tambah Usulan Kegiatan</div>
                    <hr class="relative " style="border-width: 3px;">

                    <div class="flex flex-col gap-4 my-8">
                        <input type="hidden" name="id" value="">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                            value="{{ auth()->user()->name }}" readonly>

                        <textarea id="editKeterangan" rows="10" name="description" class="relative"
                            style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                            type="text" placeholder="Keterangan"></textarea>




                        <label for="addFileInput" class="relative max-w-full"
                            style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">
                            Upload Document
                        </label>
                        <input id="addFileInput" name="document" style="display: none;" type="file">

                        <select id="lingkup" name="rt_id" class="relative"
                            style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                            @foreach ($rts as $rt)
                                <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} -
                                    {{ $rt->nama }}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                        <button type="button" data-close-modal="editActivityModal"
                            class="px-4 py-2 text-center rounded-md bg-[#777777] hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                            Close
                        </button>
                        <button id="editSaveButton" type="submit"
                            class="px-4 py-2 text-center rounded-md bg-[#27AE60] hover:opacity-80 transition flex items-center justify-center text-base text-white font-medium">
                            Save
                        </button>
                    </div>

        </div>
            </form>

        </div>
        </div>
        </div>


        {{-- Table Tambah --}}
        <div class="tabelUsulan absolute inset-x-0  p-16  left-56 bg-white mr-28 rounded-lg " style = "top:45%;width:80%">
            <p class="mb-10 text-2xl font-semibold text-gray-800">Daftar Izin Kegiatan Penduduk :</p>
            <table class=" md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6">No</th>
                        <th class="border px-4 py-2 text-center w-1/6">Nama Lengkap</th>
                        <th class="border px-4 py-2 text-center w-1/6">Keterangan</th>
                        <th class="border px-4 py-2 text-center w-1/6">Document</th>
                        <th class="border px-4 py-2 text-center w-1/6">Status</th>
                        <th class="border px-4 py-2 text-center w-1/6">Lingkup</th>
                        <th class="border px-24 py-2 text-center w-1/6">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelBody">

                    @foreach ($activities as $index => $activity)
                        <tr data-id="{{ $activity->id }}">
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $activity->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $activity->description }}</td>
                            <td class="border px-4 py-2 text-center">
                                @if ($activity->document)
                                    <a href="{{ $activity->document }}" target="_blank" rel="noopener noreferrer"
                                        class="flex justify-center items-center gap-    2">
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

                            <td class="border px-4 py-2 text-center grid grid-row-4 gap-0">
                                <a href="{{ route('detailKegiatanPD', ['id' => $activity->id]) }}">
                                    <div>
                                        <button class=""
                                            style="width:55px;height:34px;border-radius:10px;background-color:blue; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                            show
                                        </button>
                                </a>
                                <button data-edit='{{ getActivityDetailJson($activity) }}'
                                    style="width:55px;height:34px;border-radius:10px;background-color:#E2B93B; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    Edit
                                </button>
                                <button onclick="deleteActivity({{ $activity->id }}, {{ $index + 1 }})"
                                    style="width:55px;height:34px;border-radius:10px;background-color:#EB5757; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    Delete
                                </button>
        </div>
        </td>
        </tr>
        @endforeach



        <!-- Data akan ditambahkan disini setelah tombol Save ditekan -->
        </tbody>
        </table>
        </div>

        <form id="editActivityModal" class="modal" action="{{ route('updateKegiatan') }}" method="post"
            enctype="multipart/form-data" style="display: none">
            <!-- Modal content -->
            @csrf
            <div class="modal-content absolute inset-0" style="background-color:#FFFFFF;border-radius:15px;">
                <span data-close-modal="editActivityModal" class="close"
                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; line-height: 0;">&times;</span>
                <div class="relative w-fit py-3"
                    style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                    Edit Usulan Kegiatan</div>
                <hr class="relative" style="border-width: 3px;">

                <div class="flex flex-col gap-4 my-8">
                    <input type="hidden" name="id" value="">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                        value="{{ auth()->user()->name }}" readonly>

                    <textarea id="editKeterangan" rows="10" name="description" class="relative"
                        style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Keterangan"></textarea>

                    <label for="editFileInput" class="relative max-w-full"
                        style="font-size: 16px; font-family: 'Montserrat', sans-serif; font-weight: 400; height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; display: flex; align-items: center; justify-content: center;">
                        Upload Document
                    </label>
                    <input id="editFileInput" name="document" style="display: none;" type="file">

                    <select id="lingkup" name="rt_id" class="relative"
                    style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                    @foreach ($rts as $rt)
                        <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} -
                            {{ $rt->nama }}</option>
                    @endforeach
                </select>
                
                </div>


                <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                    <button type="button" data-close-modal="editActivityModal"
                        class="px-4 py-2 text-center rounded-md bg-[#777777] hover:opacity-50 transition ease-in-out delay-150 flex items-center justify-center text-base text-white font-medium">
                        Close
                    </button>
                    <button id="editSaveButton" type="submit"
                        class="px-4 py-2 text-center rounded-md bg-green-500 hover:bg-green-600 transition ease-in-out delay-150 flex items-center justify-center text-base text-white font-medium">
                        Save
                    </button>

                </div>

            </div>
        </form>
    </main>

    <script>
        // Event listener untuk tombol "Save"
        // document.getElementById("saveButton").addEventListener("click", function() {
        //     // Panggil fungsi redirect setelah tombol "Save" diklik
        //     redirectToTambahKegiatanPD();
        // });
        // Ambil modal edit
        const modalEdit = document.getElementById('editActivityModal');
        const totalData = {{ count($activities) }};

        // Ambil tombol edit
        // var editButton = document.getElementsByClassName('editbutton')[0];
        document.querySelectorAll('[data-edit]').forEach(element => {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                modalEdit.style.display = 'block';
                const data = JSON.parse(element.dataset.edit)
                // Auto Fill
                for (let key in data) {
                    const input = document.querySelector(
                        `#editActivityModal [name="${key}"]:not([type="file"])`);
                    if (input) {
                        input.value = data[key]
                    }
                }
            });
        });

        // Ambil data elemen query untuk menutup modal
        document.querySelectorAll('[data-close-modal]').forEach(element => {
            element.addEventListener('click', () => {
                const modalId = element.dataset.closeModal;
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.style.display = 'none';
                }
            })
        })


        // Ketika tombol edit diklik, tampilkan modal
        // Ketika user mengklik di luar modal, sembunyikan modal
        window.onclick = function(event) {
            if (event.target == modalEdit) {
                modalEdit.style.display = 'none';
            }
        }

        // Hapus Data Kegiatan
        function deleteActivity(id, index) {

            if (confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')) {
                fetch('{{ route('hapusKegiatanPD') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: id
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Hapus baris pada tabel
                        document.querySelector(`tr[data-id="${id}"]`)?.remove();
                        for (let i = index; i <= totalData; i++) {
                            const element = document.querySelector(`td[data-number="${i}"]`);
                            if (!element) {
                                continue;
                            }
                            element.innerText = `${parseInt(element.innerText, 10) - 1}`;
                        }
                    })
                    .catch(error => {
                        // Handle errors
                        console.error(error);
                    });
            }
        }
    </script>
@endsection
