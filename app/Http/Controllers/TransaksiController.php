<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('pelanggan')->latest()->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksi.create', [
            'layanan' => Layanan::all()
        ]);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('pelanggan', 'layanan')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_hp' => 'required',
            'layanan_id' => 'required',
            'berat' => 'required|numeric',
            'diantar' => 'required|boolean',
            'alamat' => 'nullable|required_if:diantar,1',
            'ongkir' => 'nullable|numeric'
        ]);

        // Simpan pelanggan
        $pelanggan = Pelanggan::create([
            'nama' => $request->nama_pelanggan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->diantar ? $request->alamat : '-'
        ]);

        // Hitung biaya
        $layanan = Layanan::findOrFail($request->layanan_id);
        $subtotal = $request->berat * $layanan->harga;
        $ongkir = $request->diantar ? ($request->ongkir ?? 0) : 0;
        $total = $subtotal + $ongkir;

        // Simpan transaksi
        $transaksi = Transaksi::create([
            'no_transaksi' => 'TRX' . time(),
            'pelanggan_id' => $pelanggan->id,
            'layanan_id' => $request->layanan_id,
            'berat' => $request->berat,
            'diantar' => $request->diantar,
            'ongkir' => $ongkir,
            'total' => $total,
            'status' => 'Diproses'
        ]);

        // Detail transaksi
        TransaksiDetail::create([
            'transaksi_id' => $transaksi->id,
            'layanan_id' => $layanan->id,
            'qty' => $request->berat,
            'harga' => $layanan->harga,
            'subtotal' => $subtotal
        ]);

        return redirect('/transaksi')->with('success','Transaksi berhasil dibuat');
    }

    public function nota($id)
    {
        $transaksi = Transaksi::with('pelanggan', 'layanan')->findOrFail($id);
        return view('transaksi.nota', compact('transaksi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diproses,Selesai,Diantar,Diambil',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return redirect('/transaksi')->with('success', 'Status transaksi berhasil diupdate');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect('/transaksi')->with('success', 'Transaksi berhasil dihapus');
    }
}
