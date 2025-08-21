<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route("layanan.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-12">
                            <label for="nama"><b>Kode Layanan</b></label>
                            <input type="text" name="kode" class="form-control"
                                placeholder="Masukkan Kode Layanan" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="wa"><b>Nama Layanan</b></label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan Nama Layanan" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary ms-2">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- stop modal --}}
