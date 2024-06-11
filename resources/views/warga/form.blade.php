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

    .form-container {
        margin: 20px auto;
        background: #fff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
    }

    .form-group {
        margin-bottom: 10px;
    }

    .label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .button {
        background-color: #007bff;
        color: #fff;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #0056b3;
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

        .form-container {
            padding: 15px;
            box-shadow: none;
            max-width: 100%;
        }

        .button {
            width: 100%;
            padding: 10px;
        }

        .label, .input, .button {
            font-size: 14px;
        }

        .input {
            padding: 6px;
        }
    }
</style>

<main class="mx-auto p-4 sm:p-6 md:p-36" style="min-height: 100vh; background-color: #FBEEC1;">
    <div class="form-container">
        <h2>Form Input Iuran</h2>
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-4 mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">ID</label>
                <input type="text" id="user_id" name="user_id"
                    class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                    value="{{ auth()->user()->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama" class="label">Nama:</label>
                <input type="text" id="nama" name="nama" required class="input" value="{{ auth()->user()->name }}" readonly>
            </div>

            <div class="form-group">
                <label for="periode" class="label">Tanggal Pembayaran:</label>
                <input type="date" id="periode" name="periode" required class="input">
            </div>

            <div class="form-group">
                <label for="total" class="label">Total:</label>
                <input type="number" id="total" name="total" placeholder="Nominal" required class="input">
            </div>

            <div class="form-group">
                <label for="keterangan" class="label">Keterangan:</label>
                <select id="keterangan" name="keterangan" required class="input">
                    <option value="">Pilih bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>

            <div class="form-group">
                <label for="bukti" class="label">Bukti:</label>
                <input type="file" id="bukti" name="bukti" required class="input">
            </div>

            <div class="form-group">
                <label for="rt_id" class="label">RT:</label>
                <input type="rt_id" id="rt_id" name="rt_id"
                class="mt-1 p-2 block w-full border-gray-300 rounded-md" style="background-color: #E6E6E6"
                value="{{ auth()->user()->rt_id }}" readonly>
            </div>

            <div class="form-group">
                <button type="submit" onclick="return confirmSubmit()" class="button" id="kirim">Kirim</button>
            </div>
        </form>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    $(function(){
        $(document).on('click', '#kirim', function(e) {
            e.preventDefault();
            var form = $(this).closest('form'); // get the closest form to the button

            swalWithBootstrapButtons.fire({
                title: "Apakah Anda Yakin?",
                text: "Mengirim Iuran RT",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "YA, Kirimkan!",
                cancelButtonText: "Tidak, Batalkan!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit the form if the user confirms
                    swalWithBootstrapButtons.fire({
                        title: "Iuran Berhasil Dikirim!",
                        icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Dibatalkan",
                        text: "Iuran GAGAL di Input",
                        icon: "error"
                    });
                }
            });
        });
    });
</script>
@endsection
