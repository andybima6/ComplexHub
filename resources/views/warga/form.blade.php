@extends('layouts.welcome')

@section('content')
<style>
    .custom-button {
            padding: 15px 30px;
            font-size: 20px;
            cursor: pointer;
            border: none;
            border-radius: 15px;
            background-color: #6f9bca;
            color: white;
            transition: all 0.3s ease;
        }

        /* Medium devices (tablets, 768px and up) */
        @media (max-width: 768px) {
            .custom-button {
                padding: 12px 25px;
                font-size: 18px;
            }
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (max-width: 576px) {
            .custom-button {
                padding: 10px 20px;
                font-size: 16px;
            }
        }

        /* Extra small devices (phones, less than 576px) */
        @media (max-width: 480px) {
            .custom-button {
                padding: 8px 15px;
                font-size: 14px;
            }
        }
</style>
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
