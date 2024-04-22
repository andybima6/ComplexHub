@extends('layouts.welcome')

@section('content')
<div class="container">
    <div class="flex justify-center items-center h-full">
        <div class="rounded-md p-8 bg-white shadow-lg">
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Ajukan Pengaduan Baru</h1>
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="py-2"><label for="judul" class="font-semibold">Judul</label></td>
                        <td class="py-2"><input id="judul" type="text" class="form-input w-full" name="judul" required autofocus></td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="deskripsi" class="font-semibold">Deskripsi</label></td>
                        <td class="py-2"><textarea id="deskripsi" class="form-textarea w-full" name="deskripsi" rows="5" required></textarea></td>
                    </tr>
                    <tr>
                        <td class="py-2"><label for="jenis" class="font-semibold">Jenis</label></td>
                        <td class="py-2">
                            <select id="jenis" class="form-select w-full" name="jenis" required>
                                <option value="Saran">Saran</option>
                                <option value="Pengaduan">Pengaduan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="py-2 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mb-16"></div> <!-- Margin bottom untuk menjauhkan formulir dari bagian bawah -->

<div class="container"> <!-- Bagian bawah konten -->
    <!-- Isi konten Anda di sini -->
</div>
@endsection
