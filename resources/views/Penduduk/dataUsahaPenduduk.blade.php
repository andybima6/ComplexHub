@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-size: cover; background-position: center;">
        <div class="grid">
            <div class="flex flex-col items-center">
                <div class="rounded-md relative p-8 mb-8 mx-auto" style="background-color: rgba(0, 0, 0, 0.7); background-image: url('{{ asset('img/homestay.jpg') }}'); max-width: 3000px; width: 90%; height: 500px; position: relative; border-radius: 16px;">
                    <div class="absolute inset-0 bg-black opacity-50" style="border-radius:16px"></div>
                    <div style="position: absolute; bottom: 20px; left: 10px; text-align: left;">
                        <p class="font-semibold" style="color: white">Mi Amor Bakery</p>
                        <p class="text-white" >Kami menjual aneka ragam kue, dari kue basah hingga kue kering</p>
                        <br>
                        <p class="text-white">Jl. Bandara Palmerah 11</p>
                    </div>  
                </div>
                <div class="rounded-md relative p-8 mb-8 mx-auto" style="background-color: rgba(0, 0, 0, 0.7); background-image: url('{{ asset('img/homestay.jpg') }}'); max-width: 3000px; width: 90%; height: 500px; position: relative; border-radius: 16px;">
                    <div class="absolute inset-0 bg-black opacity-50" style="border-radius:16px"></div>
                    <div style="position: absolute; bottom: 20px; left: 10px; text-align: left;">
                        <p class="font-semibold" style="color: white">Mi Amor Bakery</p>
                        <p class="text-white">Kami menjual aneka ragam kue, dari kue basah hingga kue kering</p>
                        <br>
                        <p class="text-white">Jl. Bandara Palmerah 11</p>
                    </div>
                </div>
                <div class="rounded-md relative p-8 mb-8 mx-auto" style="background-color: rgba(0, 0, 0, 0.7); background-image: url('{{ asset('img/homestay.jpg') }}'); max-width: 3000px; width: 90%; height: 500px; position: relative; border-radius: 16px;">
                    <div class="absolute inset-0 bg-black opacity-50" style="border-radius:16px"></div>
                    <div style="position: absolute; bottom: 20px; left: 10px; text-align: left;">
                        <p class="font-semibold" style="color: white">Mi Amor Bakery</p>
                        <p class="text-white">Kami menjual aneka ragam kue, dari kue basah hingga kue kering</p>
                        <br>
                        <p class="text-white">Jl. Bandara Palmerah 11</p>
                    </div>
                </div>
            </div>
        </div>        
    </main>
@endsection
