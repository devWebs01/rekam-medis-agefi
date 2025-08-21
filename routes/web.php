<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'HakRole:Dev,User']], function () {
    Route::group(['prefix' => 'pasien'], function () {
        Route::get('/', [App\Http\Controllers\PasienController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\PasienController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\PasienController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\PasienController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\PasienController::class, 'delete']);
    });
    Route::group(['prefix' => 'dokter'], function () {
        Route::get('/', [App\Http\Controllers\DokterController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\DokterController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\DokterController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\DokterController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\DokterController::class, 'delete']);
    });
    Route::group(['prefix' => 'layanan'], function () {
        Route::get('/', [App\Http\Controllers\LayananController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\LayananController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\LayananController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\LayananController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\LayananController::class, 'delete']);
    });
    Route::group(['prefix' => 'tarif'], function () {
        Route::get('/', [App\Http\Controllers\TarifController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\TarifController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\TarifController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\TarifController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\TarifController::class, 'delete']);
    });
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/', [App\Http\Controllers\JadwalController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\JadwalController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\JadwalController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\JadwalController::class, 'delete']);
        Route::get('/tindakan/{id}', [App\Http\Controllers\JadwalController::class, 'tindakan']);
        Route::post('/tindakan/up', [App\Http\Controllers\JadwalController::class, 'tindakan_up']);
        Route::get('/diagnosa/{id}', [App\Http\Controllers\JadwalController::class, 'diagnosa']);
    });
    Route::group(['prefix' => 'diagnosa'], function () {
        Route::post('/store', [App\Http\Controllers\DiagnosaController::class, 'store']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\UserController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\UserController::class, 'update']);
        Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
    });
    Route::group(['prefix' => 'riwayat'], function () {
        Route::get('/', [App\Http\Controllers\RiwayatController::class, 'index']);
    });
    Route::group(['prefix' => 'laporan'], function () {
        Route::get('/', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/harian', [App\Http\Controllers\LaporanController::class, 'harian'])->name('laporan.harian');
    });
});
