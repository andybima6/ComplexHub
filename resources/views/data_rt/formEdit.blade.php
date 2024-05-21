@foreach ($data as $d)
    <div class="modal fade text-left" id="editData{{ $d->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Edit RT</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('rt/update/' . $d->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Ketua RT</label>
                            <input type="text" class="form-control" value="{{ $d->nama }}" name="nama"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">rt</label>
                            <input type="text" class="form-control" value="{{ $d->rt }}" name="rt"
                                id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RW</label>
                            <select class="form-select" name="rw_id" id="rw_id">
                                <option value="">-- Pilih RW --</option>
                                @foreach ($select as $da)
                                    <option value={{ $da->id }} {{$data[0]->rw_id === $da->id ? 'selected' :''}}>{{ $da->rw}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <label for="exampleInputPassword1" class="form-label">Periode</label>

                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="periode_awal"
                                        value="{{ $d->periode_awal }}" id="exampleInputPassword1" required>
                                </div>
                            </div>
                            &mdash;
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="periode_akhir"
                                        value="{{ $d->periode_akhir }}" id="exampleInputPassword1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
