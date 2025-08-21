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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'HakRole:Dev,User']], function () {
    Route::group(['prefix' => 'pasien'], function () {
        Route::get('/', [PasienController::class, 'index']);
        Route::post('/store', [PasienController::class, 'store']);
        Route::get('/edit/{id}', [PasienController::class, 'edit']);
        Route::post('/update/{id}/', [PasienController::class, 'update']);
        Route::delete('/delete/{id}', [PasienController::class, 'delete']);
    });
    Route::group(['prefix' => 'dokter'], function () {
        Route::get('/', [DokterController::class, 'index']);
        Route::post('/store', [DokterController::class, 'store']);
        Route::get('/edit/{id}', [DokterController::class, 'edit']);
        Route::post('/update/{id}/', [DokterController::class, 'update']);
        Route::delete('/delete/{id}', [DokterController::class, 'delete']);
    });
    Route::group(['prefix' => 'layanan'], function () {
        Route::get('/', [LayananController::class, 'index']);
        Route::post('/store', [LayananController::class, 'store']);
        Route::get('/edit/{id}', [LayananController::class, 'edit']);
        Route::post('/update/{id}/', [LayananController::class, 'update']);
        Route::delete('/delete/{id}', [LayananController::class, 'delete']);
    });
    Route::group(['prefix' => 'tarif'], function () {
        Route::get('/', [TarifController::class, 'index']);
        Route::post('/store', [TarifController::class, 'store']);
        Route::get('/edit/{id}', [TarifController::class, 'edit']);
        Route::post('/update/{id}/', [TarifController::class, 'update']);
        Route::delete('/delete/{id}', [TarifController::class, 'delete']);
    });
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/', [JadwalController::class, 'index']);
        Route::post('/store', [JadwalController::class, 'store']);
        Route::get('/edit/{id}', [JadwalController::class, 'edit']);
        Route::post('/update/{id}/', [JadwalController::class, 'update']);
        Route::delete('/delete/{id}', [JadwalController::class, 'delete']);
        Route::get('/tindakan/{id}', [JadwalController::class, 'tindakan']);
        Route::post('/tindakan/up', [JadwalController::class, 'tindakan_up']);
        Route::get('/diagnosa/{id}', [JadwalController::class, 'diagnosa']);
    });
    Route::group(['prefix' => 'diagnosa'], function () {
        Route::post('/store', [DiagnosaController::class, 'store']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit']);
        Route::post('/update/{id}/', [UserController::class, 'update']);
        Route::delete('/delete/{id}', [UserController::class, 'delete']);
    });
    Route::group(['prefix' => 'riwayat'], function () {
        Route::get('/', [RiwayatController::class, 'index']);
    });
    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/harian', [LaporanController::class, 'harian'])->name('laporan.harian');
    });
});
