<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function harian(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $jadwals = Jadwal::whereBetween('tgl', [$request->tanggal_awal, $request->tanggal_akhir])
            ->with(['pasien', 'dokter'])
            ->orderBy('tgl', 'asc')
            ->orderBy('waktu', 'asc')
            ->get();

        return view('laporan.harian', [
            'jadwals' => $jadwals,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
        ]);
    }
}
