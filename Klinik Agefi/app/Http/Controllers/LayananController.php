<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::get();
        return view('layanan.index', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ], $massage);
        Layanan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);
        return redirect('/layanan')->with('notif', 'Data Berhasi di Tambah');
    }

    public function edit($id)
    {
        $data = Layanan::where('id', $id)->firstOrFail();
        return view('layanan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ], $massage);
        $data = Layanan::where('id', $id)->firstOrFail();
        $data->update($request->all());
        return redirect('/layanan')->with('notif', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        $data = Layanan::where('id', $id)->firstOrFail();
        $data->delete();
        return redirect('/layanan')->with('notif', 'Data Berhasil di Hapus');
    }
}
