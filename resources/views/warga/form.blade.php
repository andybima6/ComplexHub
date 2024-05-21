@extends('layouts.welcome')

@section('content')
<main>
    <button class="custom-button">Form Input Iuran</button>
    <br><br>
    <div class="form-container">
        <form action="{{ route('storeIuran') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="periode">Periode:</label>
            <input type="date" id="periode" name="periode" required>

            <label for="total">Total:</label>
            <input type="number" id="total" name="total" placeholder="Nominal" required>

            <label for="bukti">Bukti:</label>
            <input type="file" id="bukti" name="bukti" required>

            <button type="submit" onclick="return confirmSubmit()">Kirim</button>
        </form>
    </div>
    <script>
        function confirmSubmit() {
            return confirm("Apakah Anda yakin ingin mengirim data?");
        }
    </script>
</main>
@endsection
