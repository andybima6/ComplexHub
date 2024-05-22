@extends('layouts.welcome')

@section('content')
<main>
    <button class="custom-button">Form Input Iuran</button>
    <br><br>
    <div class="form-container">
        <form action="{{ route('storeIuran') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="periode">Periode:</label>
                <input type="date" id="periode" name="periode" required>
            </div>

            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" id="total" name="total" placeholder="Nominal" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" required>
            </div>

            <div class="form-group">
                <label for="bukti">Bukti:</label>
                <input type="file" id="bukti" name="bukti" required>
            </div>


            <div class="form-group">
                <label for="rt_id">Lingkup:</label>
                <select id="rt_id" name="rt_id" required>
                    <option value="1">RT & RW</option>
                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                </select>
            </div>

            <div class="form-group">
                <button type="submit" onclick="return confirmSubmit()">Kirim</button>
            </div>
        </form>
    </div>
    <script>
        function confirmSubmit() {
            return confirm("Apakah Anda yakin ingin mengirim data?");
        }
    </script>
</main>
@endsection
