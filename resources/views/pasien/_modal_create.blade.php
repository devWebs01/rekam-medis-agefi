<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route("pasien.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-12">
                            <label for="name"><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label><b>Jenis Kelamin</b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l"
                                    value="Laki-laki">
                                <label class="form-check-label" for="jk_l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p"
                                    value="Perempuan">
                                <label class="form-check-label" for="jk_p">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="wa"><b>No WA</b></label>
                            <input type="number" name="wa" class="form-control"
                                placeholder="Masukkan nomor WA diawali dengan 62" pattern="62[0-9]{9,}" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-12">
                            <label for="alamat"><b>Alamat</b></label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
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
