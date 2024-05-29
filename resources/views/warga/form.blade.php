@extends('layouts.welcome')

@section('content')
<main>
    <button class="custom-button">Form Input Iuran</button>
    <br><br>
    <div class="form-container">
        <h2>Form Input Iuran</h2>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nama" class="label">Nama:</label>
            <input type="text" id="nama" name="nama" required class="input">
            </div>
            
            <div class="form-group">
                <label for="periode" class="label">Periode:</label>
                <input type="date" id="periode" name="periode" required class="input">
            </div>

            <div class="form-group">
                <label for="total" class="label">Total:</label>
                <input type="number" id="total" name="total" placeholder="Nominal" required class="input">
            </div>

            <div class="form-group">
                <label for="keterangan" class="label">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" required class="input">
            </div>

            <div class="form-group">
                <label for="bukti" class="label">Bukti:</label>
                <input type="file" id="bukti" name="bukti" required class="input">
            </div>

            <div class="form-group">
              <label for="rt_id" class="label">RT:</label>
              <input type="number" id="rt_id" name="rt_id" required class="input">
          </div>

            <div class="form-group">
                <button type="submit" onclick="return confirmSubmit()" class="button">Kirim</button>
            </div>
        </form>
    </div>
    {{-- <script>
        function confirmSubmit() {
            return confirm("Apakah Anda yakin ingin mengirim data?");
        }
    </script> --}}
</main>
@endsection
