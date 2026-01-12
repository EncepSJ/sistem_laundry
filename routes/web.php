<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CekLaundryController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect()->route('login'); // redirect ke route login
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard.admin'))->name('admin.dashboard');

    // CRUD layanan
    Route::resource('layanan', LayananController::class);

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);
});

/*
|--------------------------------------------------------------------------
| PEGAWAI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:pegawai'])->group(function () {
    Route::get('/dashboard-pegawai', fn () => view('dashboard.pegawai'))->name('pegawai.dashboard');

    // CRUD transaksi
    Route::resource('transaksi', TransaksiController::class);

    // Nota transaksi
    Route::get('/transaksi/{id}/nota', [TransaksiController::class, 'nota'])->name('transaksi.nota');
});

/*
|--------------------------------------------------------------------------
| PELANGGAN PUBLIK (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/cek-laundry', [CekLaundryController::class, 'index'])->name('cek-laundry.form');
Route::post('/cek-laundry', [CekLaundryController::class, 'cek'])->name('cek-laundry.cek');

Route::middleware(['auth','role:pegawai'])->group(function () {
    Route::get('/dashboard-pegawai', fn () => view('dashboard.pegawai'))->name('pegawai.dashboard');
    Route::resource('transaksi', TransaksiController::class);

    // Update status
    Route::patch('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');

    // Delete transaksi
    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});
