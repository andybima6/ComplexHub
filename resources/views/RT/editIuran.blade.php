@extends('layouts.welcome')

@section('content')
<main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="form-container">
        <h2>Form Edit Iuran</h2>
        <form action="{{ route('update', $iuran->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama" class="label">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ $iuran->nama }}" required class="input">
            </div>
            
            <div class="form-group">
                <label for="periode" class="label">Periode:</label>
                <input type="date" id="periode" name="periode" value="{{ $iuran->periode }}" required class="input">
            </div>

            <div class="form-group">
                <label for="total" class="label">Total:</label>
                <input type="number" id="total" name="total" value="{{ $iuran->total }}" required class="input">
            </div>

            <div class="form-group">
                <label for="keterangan" class="label">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" value="{{ $iuran->keterangan }}" required class="input">
            </div>

            <div class="form-group">
                <label for="bukti" class="label">Bukti:</label>
                <input type="file" id="bukti" name="bukti" class="input">
                @if ($iuran->bukti)
                    <p>Current File: {{ $iuran->bukti }}</p>
                @endif
            </div>

            <div class="form-group">
              <label for="rt_id" class="label">RT:</label>
              <input type="number" id="rt_id" name="rt_id" value="{{ $iuran->rt_id }}" required class="input">
          </div>

          <div class="form-group">
            <label for="status" class="label">Status:</label>
            <select id="status" name="status" required class="input">
                <option value="Diproses" {{ $iuran->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Disetujui" {{ $iuran->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditolak" {{ $iuran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
            <div class="form-group">
                <button type="submit" onclick="return confirmSubmit()" class="button" id="edit">Kirim</button>
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
                    denyButtonText: `Tidakk`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
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
