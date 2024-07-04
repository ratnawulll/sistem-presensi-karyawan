<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\UserController;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/user/update',[UserController::class, 'update']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/user/post', [UserController::class, 'update']);
Route::get('user/json', [UserController::class, 'json']);
Route::resource('user', UserController::class);

// Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/edit/{id_Kategori}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update', [KaryawanController::class, 'update']);
Route::delete('/karyawan/hapus/{id_Kategori}', [KaryawanController::class, 'hapus']);

// Peraturan
Route::get('/peraturan', [PeraturanController::class, 'index'])->name('peraturan.index');
Route::post('/peraturan/store', [PeraturanController::class, 'store']);
Route::get('/peraturan/edit/{id_Kategori}', [PeraturanController::class, 'edit']);
Route::post('/peraturan/update', [PeraturanController::class, 'update']);
Route::delete('/peraturan/hapus/{id_Kategori}', [PeraturanController::class, 'hapus']);

// Absensi
Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
Route::get('/presensi/user', [PresensiController::class, 'index_user'])->name('presensi.index_user');
Route::post('/presensi/store', [PresensiController::class, 'store'])->name('presensi.store');
Route::get('/presensi/edit/{id_Presensi}', [PresensiController::class, 'edit']);
Route::put('/presensi/update', [PresensiController::class, 'update'])->name('presensi.update');
Route::get('/presensi/hapus/{id_Presensi}', [PresensiController::class, 'hapus']);

// Cuti
Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
Route::post('/cuti/store', [CutiController::class, 'store']);

// Laporan
Route::get('/laporan-presensi', [LaporanController::class, 'lap_presensi'])->name('laporan.presensi');
Route::get('/laporan-presensi-user', [LaporanController::class, 'lap_presensi_user'])->name('laporan.presensi_user');
//users
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
