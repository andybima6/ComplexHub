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
          <form action="{{ route('accIuranRT', ['id' => $iuran->id]) }}" method="POST">
            @csrf
            <button id="edit" class="btn btn-success text-white font-bold py-2 px-2 sm:px-4 rounded" type="submit">Disetujui</button>
          </form>
          <form action="{{ route('tolakIuranRT', ['id' => $iuran->id]) }}" method="POST">
            @csrf
            <button  class="btn btn-success text-white font-bold py-2 px-2 sm:px-4 rounded" type="submit">
                <h3>Ditolak</h3>
            </button>
          </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
    $(document).on('click', 'button[type="submit"]', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        Swal.fire({
            title: "Simpan Perubahan?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Simpan",
            denyButtonText: `Tidak`
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
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

