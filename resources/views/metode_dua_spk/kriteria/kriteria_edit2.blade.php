@extends('layouts.welcome')

@section('content')
    <main class="detail h-dvh w-3/4 mx-auto relative top-36">
        <div class="relative p-12 bg-white rounded-lg top-36">
            <p class="text-start font-semibold text-xl mb-4">Edit Criteria</p>
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

            <form action="{{ route('criterias.updatekriteria', $criteria->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="jenis" class="block text-lg font-bold text-gray-700">Jenis :</label>
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="benefit" {{ $criteria->jenis == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ $criteria->jenis == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="bobot" class="block text-lg font-bold text-gray-700">Bobot :</label>
                    <input type="number" name="bobot" id="bobot" class="form-control" value="{{ $criteria->bobot }}" step="0.01" min="0" max="1" required>
                </div>

                @error('bobot')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded ml-2 relative top-5">
                    Update
                </button>
            </form>

            <a  href="{{ url('metode_dua_spk/kriteriadestinasi2') }}">
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded ml-2 relative left-28 bottom-5">
                    kembali
                </button>
            </a>
        </div>
    </main>
@endsection
