<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dokter = Dokter::get();
        $data = User::where('role', 'User')->get();
        return view('user.index', compact('data', 'dokter'));
    }
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|min:4|max:12',
            'dokter_id' => 'required',
        ], $massage);
        $user = new \App\Models\User;
        $user->role = 'User';
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->dokter_id = $request->dokter_id;
        $user->save();
        return back()->with('notif', 'Akun Telah Tergistrasi');
    }
    public function edit($id)
    {
        $profil = User::where('id', $id)->firstOrFail();
        return view('user.edit', compact('profil'));
    }
    public function update(Request $request, $id)
    {
        $massage = [
            'required' => ':attribute  wajib di isi !!',
        ];

        $this->validate($request, [
            'password' => 'required',
        ], $massage);
        $user = \App\Models\User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/home')->with('notif', 'Data Telah Di Update');
    }
    public function delete($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with(['notif' => 'Akun </strong>' . $user->name . '</strong> Dihapus']);
    }
}
