<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pasien;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['dokter', 'pasien', 'tarif.layanan'])->where('status', 'belum')->get();
        $dokter = Dokter::get();
        $pasien = Pasien::get();
        $tarif = Tarif::get();
        $jadwal_dokter = Jadwal::with(['diagnosa', 'pasien', 'dokter', 'tarif.layanan'])->where('status', 'belum')->where('dokter_id', Auth::user()->dokter_id)->get();

        return view('jadwal.index', compact('dokter', 'pasien', 'jadwal', 'tarif', 'jadwal_dokter'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!',
        ];

        $this->validate($request, [
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tarif_id' => 'required',
            'tgl' => 'required',
            'waktu' => 'required',
        ], $messages);

        $existingSchedule = Jadwal::where('dokter_id', $request->dokter_id)
            ->where('tgl', $request->tgl)
            ->where('waktu', $request->waktu)
            ->first();

        if ($existingSchedule) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Dokter sudah memiliki jadwal pada tanggal dan waktu tersebut');
        }

        Jadwal::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'tarif_id' => $request->tarif_id,
            'tgl' => $request->tgl,
            'waktu' => $request->waktu,
            'status' => 'belum',
        ]);

        return redirect('/jadwal')->with('notif', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::with(['pasien', 'dokter', 'tarif'])->where('uuid', $id)->firstOrFail();
        $dokter = Dokter::all();
        $pasien = Pasien::all();
        $tarif = Tarif::with('layanan')->get();

        return view('jadwal.edit', compact('jadwal', 'dokter', 'pasien', 'tarif'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tarif_id' => 'required',
            'tgl' => 'required',
            'waktu' => 'required',
        ], $messages);
        $data = Jadwal::where('uuid', $id)->firstOrFail();
        $data->update($request->all());

        return redirect('/jadwal')->with('notif', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        $data = Jadwal::where('uuid', $id)->firstOrFail();
        $data->delete();

        return redirect('/jadwal')->with('notif', 'Data Berhasil di Hapus');
    }

    public function tindakan($id)
    {
        $jadwal = Jadwal::where('uuid', $id)->firstOrFail();

        return view('jadwal.tindakan', compact('jadwal'));
    }

    public function tindakan_up(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!',
        ];

        $this->validate($request, [
            'hasil' => 'required',
            'jadwal_id' => 'required|exists:jadwals,id',
        ], $messages);
        Diagnosa::create([
            'jadwal_id' => $request->jadwal_id,
            'hasil' => $request->hasil,
        ]);
        Jadwal::where('id', $request->jadwal_id)->update(['status' => 'ok']);

        return redirect('/riwayat')->with('notif', 'Data Berhasi di Tambah');
    }

    public function diagnosa($id)
    {
        $jadwal = Jadwal::with(['pasien', 'dokter', 'diagnosa'])->where('uuid', $id)->firstOrFail();

        return view('jadwal.diagnosa', compact('jadwal'));
    }
}
