@extends('layouts.welcome')

@section('content')
    {{-- MODAL DELETE --}}
    @foreach ($data as $r)
        <div class="modal fade" id="modalDelete{{ $r->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fas fa-exclamation-circle mb-2" style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                        <h5 class="text-center">Apakah anda yakin ingin menghapus RT {{ $r->rt }} ?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('/rt/delete/' . $r->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Yes, Delete it</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- END MODAL DELETE --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data RT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('rt/store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Ketua RT</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <input type="text" class="form-control" name="rt" id="exampleInputPassword1" required>
                        </div>
                        <div class="row">
                            <label for="exampleInputPassword1" class="form-label">Periode</label>
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="periode_awal" id="exampleInputPassword1" required>
                                </div>
                            </div>
                            &mdash;
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="periode_akhir" id="exampleInputPassword1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END MODAL ADD --}}

    <div class="container-fluid">
        <div class="row">
            <div class="py-3">
                <h3>Data RT</h3>
            </div>
            <section class="section">
                <div class="card shadow mb-5">
                    <div class="card-body">
                        <button class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Ketua RT</th>
                                    <th>RT</th>
                                    <th>Periode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->rt }}</td>
                                        <td>{{ $d->periode_awal }} / {{ $d->periode_akhir }}</td>
                                        <td>
                                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editData{{$d->id}}"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $d->id }}"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
