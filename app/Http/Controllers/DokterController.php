<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::get();

        return view('dokter.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!',
            'wa.regex' => 'Nomor WA harus diawali dengan 62 dan hanya berupa angka!',
        ];
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'wa' => 'required|regex:/^62[0-9]{9,}$/',
        ], $messages);
        Dokter::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'wa' => $request->wa,
        ]);

        return redirect('/dokter')->with('notif', 'Data Berhasi di Tambah');
    }

    public function edit($id)
    {
        $data = Dokter::where('id', $id)->firstOrFail();

        return view('dokter.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!',
            'wa.regex' => 'Nomor WA harus diawali dengan 62 dan hanya berupa angka!',
        ];
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'wa' => 'required|regex:/^62[0-9]{9,}$/',
        ], $messages);
        $data = Dokter::where('id', $id)->firstOrFail();
        $data->update($request->all());

        return redirect('/dokter')->with('notif', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        $data = Dokter::where('id', $id)->firstOrFail();
        $data->delete();

        return redirect('/dokter')->with('notif', 'Data Berhasil di Hapus');
    }
}
