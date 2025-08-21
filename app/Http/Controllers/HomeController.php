<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pasien;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pasien = Pasien::count();
        $dokter = Dokter::count();
        $jadwal = Jadwal::count();
        $user = User::count();
        $jadwal_dokter = Jadwal::where('dokter_id', \Auth::user()->dokter_id)->count();

        return view('home', compact('pasien', 'dokter', 'jadwal', 'user', 'jadwal_dokter'));
    }
}
