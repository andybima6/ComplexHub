@extends('layouts.welcome')

@section('content')
<style>
    /* Layout and Whitespace */
    /* Color and Contrast */
    body {
        background-color: #fff; /* Light background for better contrast */
    }

    /* Buttons */
    .search-button,
    .edit-button,
    .delete-button {
        background-color: #337ab7; /* Blue for primary buttons */
        color: #fff; /* White text for contrast */
        border: none;
        border-radius: 4px; /* Rounded corners */
        padding: 8px 16px; /* Adjust padding for comfortable click area */
        cursor: pointer; /* Indicate clickable button */
    }

    .search-button:hover,
    .edit-button:hover,
    .delete-button:hover {
        background-color: #286090; /* Darker shade on hover */
    }

    /* Modal */
    .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
}

.modal-content {
    background: white;
    text-align: center;
    max-width: 70%;
    max-height: 70%;
    position: relative; /* Adding position relative */
}

.modal img {
    max-width: 100%;
    max-height: 100%;
    height: auto;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
}

</style>
<main class="mx-auto p-8 sm:p-16 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="rounded-md relative p-4 sm:p-8 md:p-16 top-8 sm:top-16 md:top-32 left-2 sm:left-8 md:left-16 bg-white">
        <div class="card-header mb-4 flex justify-between items-center">
            <h2 class="text-lg sm:text-xl md:text-2xl font-semibold">Data Iuran Warga RT</h2>
        </div>

        <form method="GET" action="{{ route('search') }}" class="flex flex-col sm:flex-row items-start sm:items-end mb-6 space-y-4 sm:space-y-0 sm:space-x-4">
            <div>
                <label for="rt_search" class="block text-sm font-medium text-gray-700 mb-1">
                    <span class="text-blue-600">Search</span>
                </label>
                <input type="text" id="rt_search" name="rt_search" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Masukkan Nama">
            </div>
            <button type="submit" class="search-button bg-blue-500 text-white px-4 py-2 rounded-md">Cari</button>
        </form>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-black font-medium text-center">
                        <th class="border px-2 sm:px-4 py-2">No</th>
                        <th class="border px-2 sm:px-4 py-2">Nama</th>
                        <th class="border px-2 sm:px-4 py-2">Periode</th>
                        <th class="border px-2 sm:px-4 py-2">Total</th>
                        <th class="border px-2 sm:px-4 py-2">Bukti</th>
                        <th class="border px-2 sm:px-4 py-2">RT</th>
                        <th class="border px-2 sm:px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($iuran as $ir)
                    <tr class="text-center">
                        <td class="border px-4 py-2">{{ $ir->id }}</td>
                        <td class="border px-4 py-2">{{ $ir->nama }}</td>
                        <td class="border px-4 py-2">{{ $ir->periode }}</td>
                        <td class="border px-4 py-2">{{ $ir->total }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ asset('storage/' . $ir->bukti) }}" download>
                                <img src="{{ asset('storage/' . $ir->bukti) }}" alt="Bukti" class="block mx-auto max-w-xs h-auto" style="max-width: 20%;">
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $ir->rt_id }}</td>
                        <td class="border px-4 py-2">
                            @if($ir->status == 'diproses')
                                <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Diproses</button>
                            @elseif($ir->status == 'disetujui')
                                <button class="bg-green-500 text-white font-bold py-2 px-4 rounded">Disetujui</button>
                            @elseif($ir->status == 'ditolak')
                                <button class="bg-red-500 text-white font-bold py-2 px-4 rounded">Ditolak</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div id="imageModal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" onclick="hideImageModal()">
    <div class="modal-content relative p-4 bg-white rounded-md">
        <span class="close absolute top-2 right-2 text-2xl font-bold cursor-pointer" onclick="hideImageModal()">&times;</span>
        <img style="display: block; margin: 0 auto;" id="modalImage" src="" alt="Bukti" class="max-w-xs h-auto">
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function downloadImage(imageUrl) {
        const link = document.createElement('a');
        link.href = imageUrl;
        link.setAttribute('download', '');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
<script type="text/javascript">
    $(function(){
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var form = $(this).closest('form'); // get the closest form to the button

            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Data Yang dihapus tidak bisa kembali!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA, Hapus Data!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit the form if the user confirms
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });
    });

    function showImageModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').style.display = 'flex';
    }

    function hideImageModal() {
        document.getElementById('imageModal').style.display = 'none';
    }
</script>


@endsection
