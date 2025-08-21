<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Jadwal Harian</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                padding: 2rem;
                background-color: #f8f9fa;
            }

            .table th,
            .table td {
                vertical-align: middle !important;
            }

            tfoot td {
                font-weight: bold;
                background-color: #f1f1f1;
            }
        </style>
    </head>

    <body onload="window.print()">

        <div class="container">
            <h3 class="mb-4" align="center">Laporan Jadwal Harian</h3>

            <p><strong>Periode:</strong>
                {{ \Carbon\Carbon::parse($tanggal_awal)->format("d M Y") }} -
                {{ \Carbon\Carbon::parse($tanggal_akhir)->format("d M Y") }}
            </p>

            @if (count($jadwals))
                <div id="laporan-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Layanan</th>
                                    <th>Tarif (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach ($jadwals as $index => $jadwal)
                                    @php
                                        $tarif = $jadwal->tarif->nominal ?? 0;
                                        $total += $tarif;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($jadwal->tgl)->format("d/m/Y") }}</td>
                                        <td>{{ $jadwal->pasien->nama ?? "-" }}</td>
                                        <td>{{ $jadwal->dokter->nama ?? "-" }}</td>
                                        <td>{{ $jadwal->tarif->layanan->nama ?? "-" }}</td>
                                        <td class="text-right">{{ number_format($tarif, 0, ",", ".") }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">Total</td>
                                    <td class="text-right">{{ number_format($total, 0, ",", ".") }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    Tidak ada data jadwal dalam rentang tanggal ini.
                </div>
            @endif
        </div>

    </body>

</html>
