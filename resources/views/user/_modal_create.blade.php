<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route("user.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-12 col-sm-12">
                            <label class="small mb-1" for="guru_id">Nama Dokter</label>
                            <select name="dokter_id" class="form-control" required="">
                                <option value="" selected disabled>-- Pilih -- </option>
                                @foreach ($dokter as $gr)
                                    <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3 mb-3">
                        <div class="col-6 col-sm-6">
                            <label class="small mb-1" for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username Login">
                        </div>
                        <div class="col-6 col-sm-6">
                            <label class="small mb-1" for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary ms-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- stop modal --}}
