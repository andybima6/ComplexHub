@extends('layouts.welcome')

@section('content')
<main class="detail h-dvh w-3/4 mx-auto relative top-36">
    <div class="relative p-12 bg-white rounded-lg top-36">
        <h2 class="text-start font-semibold text-xl mb-4">Edit Penilaian</h2>
        <hr class="mb-4 mr-6">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- <div class="form-group mb-4">
                <label for="alternative_id" class="block text-lg font-bold text-gray-700">Alternatif</label> --}}
                {{-- <select name="alternative_id" id="alternative_id" class="form-select" required>
                    @foreach($alternatives as $alternative)
                        <option value="{{ $alternative->id }}" {{ $alternative->id == $penilaian->alternative_id ? 'selected' : '' }}>
                            {{ $alternative->alternatif }}
                        </option>
                    @endforeach
                </select> --}}
                {{-- <input type="text" name="alternative_id" id="alternative_id" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->alternative->alternatif }}" readonly>
            </div> --}}

            <div class="form-group mb-4">
                <label for="alternative_name" class="block text-lg font-bold text-gray-700">Alternatif</label>
                <input type="text" name="alternative_name" id="alternative_name" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->alternative->alternatif }}" readonly>
                <input type="hidden" name="alternative_id" value="{{ $penilaian->alternative_id }}">
            </div>




            <div class="form-group mb-4">
                <label for="biaya_tiket_masuk" class="block text-lg font-bold text-gray-700">Biaya Tiket Masuk</label>
                <input type="text" name="biaya_tiket_masuk" id="biaya_tiket_masuk" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->tiket }}">
            </div>

            <div class="form-group mb-4">
                <label for="fasilitas" class="block text-lg font-bold text-gray-700">Fasilitas</label>
                <input type="text" name="fasilitas" id="fasilitas" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->fasilitas }}">
            </div>

            <div class="form-group mb-4">
                <label for="kebersihan" class="block text-lg font-bold text-gray-700">Kebersihan</label>
                <input type="text" name="kebersihan" id="kebersihan" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->kebersihan }}">
            </div>

            <div class="form-group mb-4">
                <label for="keamanan" class="block text-lg font-bold text-gray-700">Keamanan</label>
                <input type="text" name="keamanan" id="keamanan" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->keamanan }}">
            </div>

            <div class="form-group mb-4">
                <label for="biaya_akomodasi" class="block text-lg font-bold text-gray-700">Biaya Akomodasi</label>
                <input type="text" name="biaya_akomodasi" id="biaya_akomodasi" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $penilaian->akomodasi }}">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-2 relative top-5">Update</button>
        </form>
        <a  href="{{ route('penilaian') }}">
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2 relative left-28 bottom-5">
                kembali
            </button>
        </a>
    </div>
</main>
@endsection
