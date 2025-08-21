<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route("jadwal.store") }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dokter_id">Dokter</label>
                        <select name="dokter_id" class="form-control">
                            <option value="">-- Pilih Dokter --</option>
                            @foreach ($dokter as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pasien_id">Pasien</label>
                        <select name="pasien_id" class="form-control">
                            <option value="">-- Pilih Pasien --</option>
                            @foreach ($pasien as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tarif_id">Layanan</label>
                        <select name="tarif_id" class="form-control">
                            <option value="">-- Pilih Layanan --</option>
                            @foreach ($tarif as $t)
                                <option value="{{ $t->id }}">{{ $t->layanan->nama }} ||
                                    Rp{{ number_format($t->nominal, 0, ",", ".") }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl">Tanggal</label>
                            <input type="date" name="tgl" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="waktu">Waktu</label>
                            <input type="time" name="waktu" class="form-control">
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