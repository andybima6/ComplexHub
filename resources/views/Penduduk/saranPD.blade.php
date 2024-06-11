@extends('layouts.welcome')

@section('content')
    <main class="overflow-y-auto min-h-screen">
        <div class="flex flex-col md:flex-row md:justify-between mt-20 py-24">
            <div class="mt-4 md:mt-0 relative mx-auto md:ml-52"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width: 90%; max-width: 350px; height: 275px; border-radius: 13px;">
                <p class="relative top-6 text-center md:text-left-3"
                    style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                <div class="values w-full h-62 relative top-2 text-center md:text-left-12"
                    style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <a class="bg-transparent border-white outline-none text-white w-full">
                        {{ str_pad(auth()->user()->rt_id, 2, '0', STR_PAD_LEFT) }}
                    </a>
                </div>
                </p>
            </div>

            <div id="openModal" class="flex relative w-11/12 md:w-96 mt-8 md:mt-24 mx-auto md:mx-0 md:mr-64 items-center justify-center"
                style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
                <p class="text-xl md:text-2xl text-white font-light">
                    + Tambah
                </p>
            </div>
        </div>

        <div id="myModal" class="modal">
            <!-- Modal content -->
            <form method="POST" action="{{ route('tambahSaranPD') }}" enctype="multipart/form-data"
                class="modal-content absolute inset-0 mt-20 md:mt-56 mx-auto md:w-2/3"
                style="background-color:#FFFFFF; border-radius: 15px; z-index: 9999;">
                @csrf
                <span id="closeModal" class="close">&times;</span>
                <div class="relative w-fit py-2 text-center"
                    style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                    Tambah Saran Pengaduan
                </div>
                <hr class="relative" style="border-width: 3px;">

                <div class="mt-4 mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6" value="{{ auth()->user()->name }}" readonly>
                </div>

                <div class="mt-4 mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">ID Warga</label>
                    <input type="text" id="user_id" name="user_id" class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6" value="{{ auth()->user()->id }}" readonly>
                </div>

                <div class="flex flex-col gap-4 my-8">
                    <input type="hidden" name="id" value="">
                    <input id="editNamaKegiatan" name="tanggal" class="relative p-2 w-full border-2 rounded-lg"
                        type="date" placeholder="tanggal">

                    <input id="editKeterangan" name="field" class="relative p-2 w-full border-2 rounded-lg"
                        type="text" placeholder="Bidang">

                    <textarea id="editKeterangan" rows="10" name="laporan" class="relative p-2 w-full border-2 rounded-lg"
                        placeholder="Isi Laporan"></textarea>

                    <select id="lingkup" name="rt_id" class="relative p-2 w-full border-2 rounded-lg">
                        @foreach ($rts as $rt)
                            <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} - {{ $rt->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                    <button type="button" data-close-modal="editSaranModal"
                        class="px-4 py-2 text-center rounded-md bg-gray-600 hover:opacity-80 transition text-base text-white font-medium">
                        Close
                    </button>
                    <button id="editSaveButton" type="submit"
                        class="px-4 py-2 text-center rounded-md bg-green-600 hover:opacity-80 transition text-base text-white font-medium">
                        Save
                    </button>
                </div>
            </form>
        </div>


        <div class="overflow-x-auto">
            <p class="mb-10 text-xl md:text-2xl font-semibold text-gray-800  ml -24">Daftar Saran Pengajuan Penduduk :</p>
            <table class="table-auto mx-auto w-4/5 border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 text-black font-medium text-center">
                                <th class="border px-2 sm:px-4 py-2">No</th>
                                <th class="border px-2 sm:px-4 py-2">Tanggal</th>
                                <th class="border px-2 sm:px-4 py-2">Nama</th>
                                <th class="border px-2 sm:px-4 py-2">Bidang</th>
                                <th class="border px-2 sm:px-4 py-2">Laporan</th>
                                <th class="border px-2 sm:px-4 py-2">Lingkup</th>
                                <th class="border px-2 sm:px-4 py-2">Status</th>
                                <th class="border px-2 sm:px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                <tbody id="tabelBody">
                    @foreach ($suggestions as $index => $suggestion)
                        <tr data-id="{{ $suggestion->id }}">
                            <td class="border px-4 py-2 text-center bg-white ">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2 text-center bg-white">{{ $suggestion->tanggal }}</td>
                            <td class="border px-4 py-2 text-center bg-white">{{ $suggestion->name }}</td>
                            <td class="border px-4 py-2 text-center bg-white">{{ $suggestion->field }}</td>
                            <td class="border px-4 py-2 text-center bg-white">{{ $suggestion->laporan }}</td>
                            <td class="border px-4 py-2 text-center bg-white">RT {{ $suggestion->rt_id }}</td>
                            <td class="border px-4 py-2 text-center bg-white">{{ $suggestion->status }}</td>
                            <td class="border px-6 py-2 text-center  bg-white grid-row-4 gap-1">
                                <a href="{{ route('detailSaranPD', ['id' => $suggestion->id]) }}">
                                    <button class="px-2 py-1 bg-blue-600 text-white rounded-lg text-sm">
                                        Show
                                    </button>
                                </a>
                                <button data-edit='{{ getSaranDetailJson($suggestion) }}'
                                    class="px-2 py-1 bg-yellow-600 text-white rounded-lg text-sm">
                                    Edit
                                </button>
                                <button onclick="deleteSaran({{ $suggestion->id }})"
                                    class="px-2 py-1 bg-red-600 text-white rounded-lg text-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form id="editSaranModal" class="modal" action="{{ route('updateSaranPD') }}" method="post"
            enctype="multipart/form-data" style="display: none">
            @csrf
            <div class="modal-content absolute inset-0 mx-auto mt-20 md:mt-56 w-11/12 md:w-2/3"
                style="background-color:#FFFFFF; border-radius: 15px;">
                <span data-close-modal="editSaranModal" class="close"
                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; line-height: 0;">&times;</span>
                <div class="relative w-fit py-3 text-center"
                    style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                    Edit Saran Pengaduan
                </div>
                <hr class="relative" style="border-width: 3px;">

                <div class="mt-4 mb-4">
                    <label for="editNama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="editNama" name="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md"
                        style="background-color: #E6E6E6" value="{{ auth()->user()->name }}" readonly>
                </div>

                <div class="mt-4 mb-4">
                    <label for="editUserId" class="block text-sm font-medium text-gray-700">ID Warga</label>
                    <input type="text" id="editUserId" name="user_id" class="mt-1 p-2 block w-full border-gray-300 rounded-md"
                        style="background-color: #E6E6E6" value="{{ auth()->user()->id }}" readonly>
                </div>

                <input type="hidden" name="id" value="">
                <div class="flex flex-col gap-4 my-8">
                    <input id="editTanggal" name="tanggal" class="relative p-2 w-full border-2 rounded-lg"
                        type="date" placeholder="Tanggal">

                    <input id="editBidang" name="field" class="relative p-2 w-full border-2 rounded-lg"
                        type="text" placeholder="Bidang">

                    <textarea id="editIsiLaporan" rows="10" name="laporan" class="relative p-2 w-full border-2 rounded-lg"
                        placeholder="Isi Laporan"></textarea>

                    <select id="editRt" name="rt_id" class="relative p-2 w-full border-2 rounded-lg">
                        @foreach ($rts as $rt)
                            <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} - {{ $rt->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                    <button type="button" data-close-modal="editSaranModal"
                        class="px-4 py-2 text-center rounded-md bg-gray-600 hover:opacity-80 transition text-base text-white font-medium">
                        Close
                    </button>
                    <button id="editSaveButton" type="submit"
                        class="px-4 py-2 text-center rounded-md bg-green-600 hover:opacity-80 transition text-base text-white font-medium">
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
        const modalEdit = document.getElementById('editSaranModal');
        const totalData = {{ count($suggestions) }};


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
                        `#editSaranModal [name="${key}"]:not([type="file"])`);
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
        function deleteSaran(id, index) {
            if (confirm('Apakah Anda yakin ingin menghapus Pengaduan ini?')) {
                fetch('{{ route('deleteSaranPD') }}', {
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
                        document.querySelector(`tr[data-id="${id}"]`).remove();
                        for (let i = index; i <= totalData; i++) {
                            const element = document.querySelector(`td[data-number="${i}"]`);
                            if (element) {
                                element.innerText = parseInt(element.innerText, 10) - 1;
                            }
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
