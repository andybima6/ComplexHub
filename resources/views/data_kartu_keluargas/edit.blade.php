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
      <h2 class="text-2xl font-semibold mb-4">Edit Kartu Keluarga</h2>
      <a href="{{ route('data_kartu_keluargas.index') }}" class="btn btn-primary px-4 py-2 border border-gray-500">Kembali</a>
      <form action="{{ route('data_kartu_keluargas.update', $dataKartuKeluarga->id) }}" method="POST">
        @csrf
          @method('PUT')
          <div class="form-group mb-4">
            <label for="kepala_keluarga" class="text-gray-700 font-medium mb-2">Kepala Keluarga</label>
            <input type="text" name="kepala_keluarga" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" value="{{ $dataKartuKeluarga->kepala_keluarga }}" required>
          </div>
    
          <div class="form-group mb-4">
            <label for="no_kk" class="text-gray-700 font-medium mb-2">No KK</label>
            <input type="text" name="no_kk" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" value="{{ $dataKartuKeluarga->no_kk }}" required>
          </div>
    
          <div class="form-group mb-4">
            <label for="alamat" class="text-gray-700 font-medium mb-2">Alamat</label>
            <input type="text" name="alamat" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" value="{{ $dataKartuKeluarga->alamat }}" required>
          </div>
    
          <div class="form-group mb-4">
            <label for="rt_id" class="text-gray-700 font-medium mb-2">RT</label>
            <select name="rt_id" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
              @foreach($rts as $rt)
              <option value="{{ $rt->id }}" {{ $rt->id == $dataKartuKeluarga->rt_id ? 'selected' : '' }}>{{ $rt->rt_id }}</option>
              @endforeach
            </select>
          </div>
    
          {{-- <div class="form-group mb-4">
            <label for="status_ekonomi" class="text-gray-700 font-medium mb-2">Status Ekonomi</label>
            <select name="status_ekonomi" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-500 focus:ring-1" required>
              <option value="mampu" {{ $dataKartuKeluarga->status_ekonomi == 'mampu' ? 'selected' : '' }}>Mampu</option>
              <option value="tidak mampu" {{ $dataKartuKeluarga->status_ekonomi == 'tidak mampu' ? 'selected' : '' }}>Tidak Mampu</option>
            </select>
          </div> --}}
          <div class="form-group">
            <button type="submit" onclick="return confirmSubmit()" class="button w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="edit">Update</button>
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

