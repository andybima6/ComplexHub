@extends('layouts.welcome')

@section('content')
<style>
    @media (min-width: 768px) {
        .form-container {
            padding: 2rem;
        }
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 1rem;
        }

        .input {
            font-size: 1rem;
        }

        .button {
            font-size: 1rem;
        }
    }
    
</style>
<main class="mx-auto p-4 md:p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="form-container max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Form Edit Iuran</h2>
        <form action="{{ route('update', $iuran->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ $iuran->nama }}" required class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          </div>
          
          <div class="form-group mb-4">
            <label for="periode" class="block text-sm font-medium text-gray-700 mb-2">Periode:</label>
            <input type="date" id="periode" name="periode" value="{{ $iuran->periode }}" required class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <div class="form-group mb-4">
            <label for="total" class="block text-sm font-medium text-gray-700 mb-2">Total:</label>
            <input type="number" id="total" name="total" value="{{ $iuran->total }}" required class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <div class="form-group mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan:</label>
            <input type="text" id="keterangan" name="keterangan" value="{{ $iuran->keterangan }}" required class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <div class="form-group mb-4">
            <label for="bukti" class="block text-sm font-medium text-gray-700 mb-2">Bukti:</label>
            <input type="file" id="bukti" name="bukti" class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @if ($iuran->bukti)
                <p class="text-sm text-gray-600 mt-2">Current File: {{ $iuran->bukti }}</p>
            @endif
          </div>

          <div class="form-group mb-4">
            <label for="rt_id" class="block text-sm font-medium text-gray-700 mb-2">RT:</label>
            <input type="number" id="rt_id" name="rt_id" value="{{ $iuran->rt_id }}" required class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          </div>

          <div class="form-group mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status:</label>
            <select id="status" name="status" required class="input w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="Diproses" {{ $iuran->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Disetujui" {{ $iuran->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditolak" {{ $iuran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
          </div>

          <div class="form-group">
            <button type="submit" onclick="return confirmSubmit()" class="button w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="edit">Kirim</button>
          </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '#edit', function(e) {
                e.preventDefault();
                var form = $(this).closest('form'); // get the closest form to the button

                Swal.fire({
                    title: "Simpan Perubahan?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    denyButtonText: `Tidak`
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // submit the form if the user confirms
                        Swal.fire("Saved!", "", "success");
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            });
        });
    </script>
    
</main>
@endsection

