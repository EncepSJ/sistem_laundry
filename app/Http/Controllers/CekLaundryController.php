<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class CekLaundryController extends Controller
{
    // Menampilkan form input kode transaksi
    public function index()
    {
        return view('cek-laundry.index');
    }

    // Proses input kode transaksi
    public function cek(Request $request)
    {
        $request->validate([
            'no_transaksi' => 'required|string'
        ]);

        $transaksi = Transaksi::with('pelanggan','layanan')
                        ->where('no_transaksi', $request->no_transaksi)
                        ->first();

        if(!$transaksi) {
            return redirect()->back()->with('error','Transaksi tidak ditemukan.');
        }

        return view('cek-laundry.hasil', compact('transaksi'));
    }
}
