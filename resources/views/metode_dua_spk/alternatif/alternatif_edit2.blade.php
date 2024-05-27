@extends('layouts.welcome')

@section('content')
    <main class="detail h-dvh w-3/4 mx-auto relative top-36">
        <div class="relative p-12 bg-white rounded-lg top-36">
            <p class="text-start font-semibold text-xl mb-4">Edit Alternatif</p>
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

            <form action="{{ route('alternatives.update', $alternatives->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="alternatif" class="block text-lg font-bold text-gray-700">Alternatif :</label>
                    <input type="text" name="alternatif" id="alternatif" class="form-control w-full p-2 border border-gray-300 rounded-md" value="{{ $alternatives->alternatif }}" required>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-2 relative top-5">
                    Update
                </button>


            </form>
            <a  href="{{ url('metode_dua_spk/alternatif/alternatifdestinasi2') }}">
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2 relative left-28 bottom-5">
                    kembali
                </button>
            </a>
        </div>
    </main>
@endsection
