<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $data = Tarif::get();
        $layanan = Layanan::get();

        return view('tarif.index', compact('layanan', 'data'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!',
            'numeric' => ':attribute harus berupa angka !!',
            'min' => ':attribute tidak boleh kurang dari :min !!',
        ];

        $this->validate($request, [
            'layanan_id' => 'required',
            'nominal' => 'required|numeric|min:1000',
        ], $messages);

        Tarif::create([
            'layanan_id' => $request->layanan_id,
            'nominal' => $request->nominal,
        ]);

        return redirect('/tarif')->with('notif', 'Data Berhasil di Tambah');
    }

    public function edit($id)
    {
        $layanan = Layanan::get();
        $data = Tarif::where('id', $id)->firstOrFail();

        return view('tarif.edit', compact('data', 'layanan'));
    }

    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];
        $this->validate($request, [
            'layanan_id' => 'required',
            'nominal' => 'required',
        ], $massage);
        $data = Tarif::where('id', $id)->firstOrFail();
        $data->update($request->all());

        return redirect('/tarif')->with('notif', 'Data Berhasil di Edit');
    }

    public function delete($id)
    {
        $data = Tarif::where('id', $id)->firstOrFail();
        $data->delete();

        return redirect('/tarif')->with('notif', 'Data Berhasil di Hapus');
    }
}
