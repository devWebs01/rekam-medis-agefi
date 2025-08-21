@extends("layouts.app")

@section("content")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Filter Laporan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-filter me-1"></i>
                Filter Berdasarkan Tanggal
            </div>
            <div class="card-body">
                <form id="filter-form">
                    <div class="row align-items-end">
                        <div class="col-md-4 mb-3">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                                value="{{ request("tanggal_awal") }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir"
                                value="{{ request("tanggal_akhir") }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button type="submit" class="btn btn-primary w-100">Lihat Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="report-results"></div>

    </div>
@endsection

@push("scripts")
    <script>
        $(document).ready(function() {
            // Fungsi untuk format angka ke Rupiah
            function formatRupiah(angka, prefix) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
            }

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();

                var tanggalAwal = $('#tanggal_awal').val();
                var tanggalAkhir = $('#tanggal_akhir').val();
                var resultsContainer = $('#report-results');

                resultsContainer.html('<div class="text-center">Memuat data...</div>');

                $.ajax({
                    url: '{{ route("laporan.preview") }}',
                    type: 'GET',
                    data: {
                        tanggal_awal: tanggalAwal,
                        tanggal_akhir: tanggalAkhir
                    },
                    success: function(data) {
                        resultsContainer.empty();

                        if (data.length > 0) {
                            var printUrl = '{{ route("laporan.harian") }}?tanggal_awal=' +
                                tanggalAwal + '&tanggal_akhir=' + tanggalAkhir;
                            var tableHtml =
                                '<div class="card mb-4"><div class="card-header"><div class="d-flex justify-content-between align-items-center"><span><i class="fas fa-table me-1"></i> Hasil Laporan</span><a href="' +
                                printUrl +
                                '" target="_blank" class="btn btn-success"><i class="fas fa-print me-2"></i> Cetak Laporan</a></div></div><div class="card-body"><div class="table-responsive text-nowrap text-center"><table class="table table-bordered" width="100%" cellspacing="0"><thead><tr class="text-center"><th>No</th><th>Tanggal</th><th>Pasien</th><th>Dokter</th><th>Layanan</th><th>Nominal</th></tr></thead><tbody>';
                            var totalPendapatan = 0;

                            $.each(data, function(index, item) {
                                var tgl = new Date(item.tgl).toLocaleDateString(
                                    'id-ID', {
                                        day: '2-digit',
                                        month: '2-digit',
                                        year: 'numeric'
                                    });
                                var nominal = item.tarif ? parseInt(item.tarif
                                    .nominal) : 0;
                                totalPendapatan += nominal;

                                tableHtml += '<tr>';
                                tableHtml += '<td class="text-center">' + (index + 1) +
                                    '</td>';
                                tableHtml += '<td class="text-center">' + tgl + '</td>';
                                tableHtml += '<td>' + (item.pasien ? item.pasien.nama :
                                    '-') + '</td>';
                                tableHtml += '<td>' + (item.dokter ? item.dokter.nama :
                                    '-') + '</td>';
                                tableHtml += '<td>' + (item.tarif && item.tarif
                                        .layanan ? item.tarif.layanan.nama : '-') +
                                    '</td>';
                                tableHtml += '<td class="text-right">' + formatRupiah(
                                    nominal, 'Rp ') + '</td>';
                                tableHtml += '</tr>';
                            });

                            tableHtml +=
                                '</tbody><tfoot><tr><th colspan="5" class="text-right">Total Pendapatan</th><th class="text-right">' +
                                formatRupiah(totalPendapatan, 'Rp ') +
                                '</th></tr></tfoot></table></div></div></div>';
                            resultsContainer.html(tableHtml);
                        } else {
                            resultsContainer.html(
                                '<div class="alert alert-warning text-center">Tidak ada data untuk rentang tanggal yang dipilih.</div>'
                            );
                        }
                    },
                    error: function(xhr) {
                        resultsContainer.empty();
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '<div class="alert alert-danger"><ul>';
                        $.each(errors, function(key, value) {
                            errorHtml += '<li>' + value[0] + '</li>';
                        });
                        errorHtml += '</ul></div>';
                        resultsContainer.html(errorHtml);
                    }
                });
            });
        });
    </script>
@endpush
