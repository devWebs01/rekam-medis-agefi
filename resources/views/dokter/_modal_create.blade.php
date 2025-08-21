<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route("dokter.store") }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-12">
                            <label for="wa"><b>No WA</b></label>
                            <input type="number" name="wa" class="form-control"
                                placeholder="Contoh: 6281234567890" pattern="62[0-9]{9,}" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-12">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap" required></textarea>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
{{-- stop modal --}}