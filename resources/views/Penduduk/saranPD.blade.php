@extends('layouts.welcome')

@section('content')
<style>
    
</style>
<main class="mx-auto p-5 sm:p-10 md:p-2 contain-responsive" style="min-height: 50vh; background-color: #FBEEC1;">
    <div class="md:justify-between mt-20 py-24 flex flex-col md:flex-row">
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
    
        <div id="openModal" class="flex relative mt-4 md:mt-0 w-full md:w-96 items-center justify-center md:mr-64"
            style="background-color: #2F80ED; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25)); height: 96px; cursor: pointer;">
            <p style="font-size: 24px; color: white; font-family: 'Poppins', sans-serif; font-weight: 300;">
                + Tambah
            </p>
        </div>
    </div>

    

    <div id="myModal" tabindex="-1" aria-hidden="true" class="modal">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Saran Pengaduan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('tambahSaranPD') }}" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" name="id" value="">
                    <input id="editNamaKegiatan" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" type="date" placeholder="tanggal">

                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ auth()->user()->name }}" readonly>
                    </div>

                    <input id="editKeterangan" name="field" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" type="text" placeholder="Bidang">

                    <textarea id="editKeterangan" rows="4" name="laporan" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Isi Laporan"></textarea>                    

                    <select id="lingkup" name="rt_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        @foreach ($rts as $rt)
                            <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} - {{ $rt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-28 h-10 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                        Close
                    </button>
                    <button id="editSaveButton" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





            {{-- Table Tambah --}}
            <div class="relative overflow-x-auto mx-auto" style="max-width:90%; background-color: #FFFFFF;">
                <p class="mb-10 text-2xl text-left text-black" style="font-family: 'Poppins', sans-serif;">Daftar Saran Pengajuan Penduduk :</p>
                <table class="w-full text-sm text-left rtl:text-right text-black">
                    <thead class="text-xs uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Bidang</th>
                            <th scope="col" class="px-6 py-3">Laporan</th>
                            <th scope="col" class="px-6 py-3">Lingkup</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suggestions as $index => $suggestion)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-center">{{ $suggestion->tanggal }}</td>
                            <td class="px-6 py-4 text-center">{{ $suggestion->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $suggestion->field }}</td>
                            <td class="px-6 py-4 text-center">{{ $suggestion->laporan }}</td>
                            <td class="px-6 py-4 text-center">RT {{ $suggestion->rt_id }}</td>
                            <td class="px-6 py-4 text-center">{{ $suggestion->status }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('detailSaranPD', ['id' => $suggestion->id]) }}" class="btn-action bg-blue-500 text-white px-3 py-1 rounded">Show</a>
                                    <button class="btn-action bg-yellow-500 text-white px-3 py-1 rounded" data-edit='{{ getSaranDetailJson($suggestion) }}'>Edit</button>
                                    <button class="btn-action bg-red-500 text-white px-3 py-1 rounded" onclick="deleteSaran({{ $suggestion->id }}, {{ $index + 1 }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            
            
            

        <form id="editSaranModal" class="modal" action="{{ route('updateSaranPD') }}" method="post" enctype="multipart/form-data" style="display: none">
    <!-- Modal content -->
    @csrf
    <div class="modal-content relative bg-white rounded-lg shadow" style="max-width: 28rem;">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-lg font-semibold text-gray-900">
                Edit Saran Pengaduan
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-close-modal="editSaranModal">
                &times;
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form method="POST" action="{{ route('updateSaranPD') }}" enctype="multipart/form-data" class="p-4 md:p-5">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-2">
                <input type="hidden" name="id" value="">
                <input id="editNamaKegiatan" name="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" type="date" placeholder="Tanggal">

                <div class="col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ auth()->user()->name }}" readonly>
                </div>

                <input id="editKeterangan" name="field" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" type="text" placeholder="Bidang">

                <textarea id="editKeterangan" rows="4" name="laporan" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Isi Laporan"></textarea>

                <select id="lingkup" name="rt_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    @foreach ($rts as $rt)
                        <option value="{{ $rt->id }}">RT {{ str_pad($rt->id, 3, '0', STR_PAD_LEFT) }} - {{ $rt->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-end">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-28 h-10 ms-auto inline-flex justify-center items-center" data-close-modal="editSaranModal">
                    Close
                </button>
                <button id="editSaveButton" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Save
                </button>
            </div>
        </form>
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
