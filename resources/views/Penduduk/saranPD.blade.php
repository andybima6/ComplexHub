@extends('layouts.welcome')

@section('content')
    <main style="overflow-y: auto; min-height: 100vh;">
        <div class="md:justify-between mt-20 py-24 flex ">
            <div class="md:ml-52 mt-4 md:mt-0 relative"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); width:350px;height:275px;border-radius:13px">
                <p class="relative md:right-24 top-6 text-center md:text-left;"
                    style="font-size: 45px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                <div class="values w-911 h-62 relative md:left-32 top-2 text-center md:text-left"
                    style="font-size: 120px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    <a class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                        {{ str_pad(auth()->user()->rt_id, 2, '0', STR_PAD_LEFT) }}
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
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <form method="POST" action="{{ route('tambahSaranPD') }}" enctype="multipart/form-data"
                    class="modal-content absolute inset-0 mt-56"
                    style="background-color:#FFFFFF;border-radius:15px;z-index:9999;">
                    @csrf
                    <span id="closeModal" class="close">&times;</span>
                    <div class="relative w-fit py-2"
                        style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                        Tambah Saran Pengaduan
                    </div>
                    <hr class="relative" style="border-width: 3px;">

                    <div class="flex flex-col gap-4 my-8">
                        <input type="hidden" name="id" value="">
                        <input id="editNamaKegiatan" name="tanggal" class="relative"
                            style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                            type="date" placeholder="tanggal">

                            <div class="mt-4 mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6" value="{{ auth()->user()->name }}" readonly>
                            </div>

                        {{-- <input id="editNamaKegiatan" name="name" class="relative"
                            style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                            type="text" placeholder="Hal yang diajukan"> --}}

                        <input id="editKeterangan" name="field" class="relative"
                            style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                            type="text" placeholder="Bidang">

                        <textarea id="editKeterangan" rows="10" name="laporan" class="relative"
                            style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                            placeholder="Isi Laporan"></textarea>

                        <select id="lingkup" name="rt_id" class="relative"
                            style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                            @foreach ($rts as $rt)
                                <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} -
                                    {{ $rt->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                        <button type="button" data-close-modal="editSaranModal"
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




            {{-- Table Tambah --}}
            <div class="tabelUsulan absolute inset-x-0  p-16  left-56 bg-white mr-28 rounded-lg "
                style = "top:45%;width:80%">
                <p class="mb-10 text-2xl font-semibold text-gray-800">Daftar Saran Pengajuan Penduduk :</p>
                <table class=" md:table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 text-center w-1/6">No</th>
                            <th class="border px-4 py-2 text-center w-1/6">Tanggal</th>
                            <th class="border px-4 py-2 text-center w-1/6">Name</th>
                            <th class="border px-4 py-2 text-center w-1/6">Bidang </th>
                            <th class="border px-4 py-2 text-center w-1/6">Laporan</th>
                            <th class="border px-4 py-2 text-center w-1/6">Lingkup</th>
                            <th class="border px-4 py-2 text-center w-1/6">Status</th>
                            <th class="border px-24 py-2 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelBody">
                        <tr>
                            @foreach ($suggestions as $index => $suggestion)
                        <tr data-id="{{ $suggestion->id }}">
                            <td class="border px-4 py-2 text-center" data-number="{{ $index + 1 }}">{{ $index + 1 }}
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $suggestion->tanggal }}</td>
                            <td class="border px-4 py-2 text-center">{{ $suggestion->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $suggestion->field }}</td>
                            <td class="border px-4 py-2 text-center">{{ $suggestion->laporan }}</td>
                            <td class="border px-4 py-2 text-center">RT {{ $suggestion->rt_id }}</td>
                            <td class="border px-4 py-2 text-center">{{ $suggestion->status }}</td>
                            <td class="border px-4 py-2 text-center grid grid-row-4 gap-0">
                                <a href="{{ route('detailSaranPD', ['id' => $suggestion->id]) }}">
                                    <div>
                                        <button class=""
                                            style="width:55px;height:34px;border-radius:10px;background-color:blue; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                            show
                                        </button>
                                </a>
                                <button data-edit='{{ getSaranDetailJson($suggestion) }}'
                                    style="width:55px;height:34px;border-radius:10px;background-color:#E2B93B; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    Edit
                                </button>
                                <button onclick="deleteSaran({{ $suggestion->id }}, {{ $index + 1 }})"
                                    style="width:55px;height:34px;border-radius:10px;background-color:#EB5757; font-family: 'Montserrat', sans-serif; font-size: 10px;color:white;">
                                    Delete
                                </button>

            </div>
            </td>
            </tr>
            @endforeach

            </tr>
            <!-- Data akan ditambahkan disini setelah tombol Save ditekan -->
            </tbody>
            </table>
        </div>

        <form id="editSaranModal" class="modal" action="{{ route('updateSaranPD') }}" method="post"
            enctype="multipart/form-data" style="display: none">
            <!-- Modal content -->
            @csrf
            <div class="modal-content absolute inset-0" style="background-color:#FFFFFF;border-radius:15px;">
                <span data-close-modal="editSaranModal" class="close"
                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; line-height: 0;">&times;</span>
                <div class="relative w-fit py-3"
                    style="font-size: 24px; color: #000000; font-family: 'Poppins', sans-serif; font-weight: 100;">
                    Edit Saran Pengaduan</div>
                <hr class="relative" style="border-width: 3px;">

                <div class="flex flex-col gap-4 my-8">
                    <input type="hidden" name="id" value="">
                    <input id="editNamaKegiatan" name="tanggal" class="relative"
                        style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px;"
                        type="date" placeholder="tanggal">

                        <div class="mt-4 mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="mt-1 p-2 block w-full border-gray-300 rounded-md"  style="background-color: #E6E6E6" value="{{ auth()->user()->name }}" readonly>
                        </div>


                    <input name="field" class="relative"
                        style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Bidang">

                    <textarea rows="10" name="laporan" class="relative"
                        style="background-color: #FFFFFF; border: 5px solid #D9D9D9;border-radius:13px; text-align: left; vertical-align: top;"
                        type="text" placeholder="Isi Laporan"></textarea>


                    <select id="lingkup" name="rt_id" class="relative"
                        style="height: 44px; background-color: #FFFFFF; border: 5px solid #D9D9D9; border-radius: 13px;">
                        @foreach ($rts as $rt)
                            <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} -
                                {{ $rt->nama }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="absolute right-8 bottom-8 flex flex-row items-center gap-3">
                    <button type="button" data-close-modal="editSaranModal"
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
