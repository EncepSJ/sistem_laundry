<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CekLaundryController;

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', fn () => view('dashboard.admin'))
        ->name('admin.dashboard');

    // CRUD Layanan (index, create, store, edit, update, destroy)
    Route::resource('layanan', LayananController::class);

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
});

/*
|--------------------------------------------------------------------------
| PEGAWAI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pegawai'])->group(function () {

    Route::get('/dashboard-pegawai', fn () => view('dashboard.pegawai'))
        ->name('pegawai.dashboard');

    // CRUD Transaksi
    Route::resource('transaksi', TransaksiController::class);

    // Update Status Transaksi
    Route::patch('/transaksi/{id}/status',
        [TransaksiController::class, 'updateStatus']
    )->name('transaksi.updateStatus');
});

/*
|--------------------------------------------------------------------------
| PELANGGAN PUBLIK (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/cek-laundry', [CekLaundryController::class, 'index'])
    ->name('cek-laundry.form');

Route::post('/cek-laundry', [CekLaundryController::class, 'cek'])
    ->name('cek-laundry.cek');
