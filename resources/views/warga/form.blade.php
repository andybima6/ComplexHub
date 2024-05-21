@extends('layouts.welcome')

@section('content')
<main>
    <button class="custom-button">Form Input Iuran</button>
    <br><br>
    <div class="form-container">
        <form action="submit_url" method="post" enctype="multipart/form-data">
            <label for="rt">RT:</label>
            <select id="rt" name="rt">
                <option value="" disabled selected>Pilih RT</option>
                <!-- Tambahkan opsi RT sesuai kebutuhan -->
                <option value="rt1">RT 1</option>
                <option value="rt2">RT 2</option>
            </select>            
            <label for="nama">Nama:</label>
            <select id="nama" name="nama">
                <option value="" disabled selected>Pilih Nama</option>
                <!-- Tambahkan opsi nama sesuai kebutuhan -->
                <option value="nama1">Nama 1</option>
                <option value="nama2">Nama 2</option>
            </select>
            <label for="periode">Periode:</label>
            <select id="periode" name="periode">
                <option value="" disabled selected>Pilih Periode</option>
                <!-- Tambahkan opsi periode sesuai kebutuhan -->
                <option value="periode1">Periode 1</option>
                <option value="periode2">Periode 2</option>
            </select>
            <label for="total">Total:</label>
            <input type="text" id="total" name="total" value="Nominal">
            <label for="bukti">Bukti:</label>
            <input type="file" id="bukti" name="bukti">
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
