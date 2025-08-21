<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $dokter = Dokter::get();
        $data = User::with('dokter')->where('role', 'User')->get();

        return view('user.index', compact('data', 'dokter'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute  wajib di isi !!',
            'unique' => ':attribute sudah terdaftar',
        ];

        $this->validate($request, [
            'username' => 'required|min:4|unique:users,username',
            'password' => 'required|min:4|max:12',
            'dokter_id' => 'required',
        ], $messages);
        User::create([
            'role' => 'User',
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'dokter_id' => $request->dokter_id,
        ]);

        return back()->with('notif', 'Akun Telah Tergistrasi');
    }

    public function edit($id)
    {
        $profil = User::where('id', $id)->firstOrFail();

        return view('user.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'password' => 'required',
        ], $messages);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/home')->with('notif', 'Data Telah Di Update');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();

        return redirect()->back()->with(['notif' => 'Akun </strong>'.$user->name.'</strong> Dihapus']);
    }
}
