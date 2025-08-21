<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;

class RiwayatController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::where('status', 'ok')->get();
        $data = Jadwal::with('diagnosa')->where('status', 'ok')->where('dokter_id', \Auth::user()->dokter_id)->get();

        return view('riwayat.index', compact('data', 'jadwal'));
    }
}
