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
                <select id="rt_id" name="rt_id" required class="input">
                    <option value="" disabled selected>Select RT</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
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
