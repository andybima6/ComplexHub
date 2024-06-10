@extends('layouts.welcome')
@section('content')
    {{-- Content --}}
    <main class="mx-auto p-36 contain-responsive" style="min-height: 100vh; background-color: #FBEEC1;">
        <div class="opsi flex flex-col md:flex-row md:justify-between mt-20">
            <div class="md:w-2/5 h-96 rounded-md md:ml-16 mt-4 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="values w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 80px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    RT :
                    <div class="values w-911 h-62 relative md:left-96 top-2 text-center md:text-left"
                        style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                        {{-- <label for="rt_id" class="block text-sm font-medium text-gray-700"></label> --}}
                        <select id="rt_id" name="rt_id" class="bg-transparent border-white outline-none text-white w-full md:w-auto" onchange="filterRT()">
                            <option value="">0</option>
                            @foreach($rts as $rt)
                                <option value="{{ $rt->id }}">{{ $rt->id }}</option>
                            @endforeach
                            <!-- tambahkan opsi lainnya sesuai kebutuhan -->
                        </select>
                    </div>
                </p>
            </div>
            <div class="md:w-2/5 h-96 rounded-md md:relative md:mr-16 mt-8 md:mt-0"
                style="background-color: #659DBD; filter: drop-shadow(12px 13px 4px rgba(2, 109, 124, 0.25));">
                <p class="w-911 h-62 relative md:left-20 top-16 text-center md:text-left"
                    style="font-size: 60px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                    Total UMKM :
                    <div id="total-umkm" class="w-911 h-62 relative md:left-96 top-12 ml-12 text-center md:text-left"
                        style="font-size: 146px; font-family: 'Poppins', sans-serif; font-weight: 600; color: #FFFEFE;">
                        <selected class="bg-transparent border-white outline-none text-white w-full md:w-auto">
                            <option value="{{ count($izinUsaha) }}">{{ count($izinUsaha) }}</option>
                        </selected>
                    </div>
                </p>
            </div>
        </div>




        <div class="rounded-md relative p-16 top-32 left-16" style="background-color: white">
            <p class="mb-10"  style="font-size: 24px; font-family: 'Poppins', sans-serif; font-weight: 600; color: black;">Daftar Izin Usaha RT :</p>
            <table class="md:table-fixed w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">No</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Warga</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Nama Usaha</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Deskripsi</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Foto Produk</th>
                        <th class="border px-4 py-2 text-center w-1/6" style="color: black">Lingkup</th>
                        {{-- <th class="border px-4 py-2 text-center w-1/6" style="color: black">Status</th> --}}
                    </tr>
                </thead>
                <tbody id="umkm-table">
                    @foreach ($izinUsaha as $index => $izin)
                    <tr data-rt="{{ $izin->rt_id }}">
                        <td class="border px-4 py-2 text-center" style="color: black" data-number="{{ $index + 1 }}">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_warga }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->nama_usaha }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">{{ $izin->deskripsi }}</td>
                        <td class="border px-4 py-2 text-center" style="color: black">
                            <div class="flex justify-center">
                                <img style="padding-right: 45%" src="{{ asset('storage/' . $izin->foto_produk) }}" alt="">
                            </div>
                        </td>
                        <td class="border px-4 py-2 text-center" style="color: black">RT {{ $izin->rt_id }}</td>
                        {{-- <td class="border px-4 py-2 text-center" style="color: black">Pending</td> --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
<script>
    function filterRT() {
        var selectedRT = document.getElementById('rt_id').value;
        var rows = document.querySelectorAll('#umkm-table tr');
        var totalumkm = 0;
        for (var i = 0; i < rows.length; i++) { // Mulai dari indeks 1 untuk melewati baris header
            var rtIdCell = rows[i].getAttribute('data-rt');
            if (selectedRT === "" || rtIdCell === selectedRT) {
                rows[i].style.display = "";
                totalumkm++;
            } else {
                rows[i].style.display = "none";
            }
        }
        // Update total umkm
        document.getElementById('total-umkm').innerText = totalumkm;
    }
</script>