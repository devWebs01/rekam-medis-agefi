<?php

use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'HakRole:Dev,User']], function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('tarif', TarifController::class);
    Route::resource('user', UserController::class);
    Route::resource('jadwal', JadwalController::class);

    Route::get('jadwal/tindakan/{id}', [JadwalController::class, 'tindakan'])->name('jadwal.tindakan');
    Route::post('jadwal/tindakan/up', [JadwalController::class, 'tindakan_up'])->name('jadwal.tindakan_up');
    Route::get('jadwal/diagnosa/{id}', [JadwalController::class, 'diagnosa'])->name('jadwal.diagnosa');

    Route::post('diagnosa/store', [DiagnosaController::class, 'store'])->name('diagnosa.store');

    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/harian', [LaporanController::class, 'harian'])->name('laporan.harian');
    });
});
