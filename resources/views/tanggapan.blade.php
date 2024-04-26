@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
            <p class="mb-10" style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Tanggapan:</p>
            <hr class="mb-6">
            <form action="{{ url('/saran') }}" method="GET">
                @csrf
                <div class="mb-6">
                    <label for="tanggapan" class="font-bold text-lg" style="color: black;">Tanggapan:</label>
                    <textarea name="tanggapan" id="tanggapan" rows="5" class="w-full border border-gray-300 rounded-lg p-2" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2" style="border-radius: 10px;">Kirim Tanggapan</button>
                    <a href="{{ url('/saran') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" style="border-radius: 10px;">Batal</a>
                </div>
            </form>
        </div>
    </main>
@endsection
