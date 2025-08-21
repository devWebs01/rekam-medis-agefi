<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::get();

        return view('pasien.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!',
            'wa.regex' => 'Nomor WA harus diawali dengan 62 dan hanya berupa angka!',
            'wa.unique' => 'Nomor WA ini sudah terdaftar!',
        ];
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'wa' => 'required|unique:pasiens,wa|regex:/^62[0-9]{9,}$/',
            'jk' => 'required',
        ], $messages);
        Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'wa' => $request->wa,
            'jk' => $request->jk,
        ]);

        return redirect('pasien')->with('notif', 'Data Berhasi di Tambah');
    }

    public function edit($id)
    {
        $data = Pasien::where('id', $id)->firstOrFail();

        return view('pasien.edit', compact('data'));
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
            'jk' => 'required',
        ], $messages);
        $data = Pasien::where('id', $id)->firstOrFail();
        $data->update($request->all());

        return redirect('/pasien')->with('notif', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        $data = Pasien::where('id', $id)->firstOrFail();
        $data->delete();

        return redirect('pasien')->with('notif', 'Data Berhasil di Hapus');
    }
}
