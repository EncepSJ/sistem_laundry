<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI SESUAI DATABASE
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric'
        ]);

        // ✅ INSERT DATA YANG BENAR
        Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga
        ]);

        return redirect('/layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        // ✅ VALIDASI ULANG
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric'
        ]);

        // ✅ UPDATE AMAN (TANPA request->all())
        Layanan::findOrFail($id)->update([
            'nama_layanan' => $request->nama_layanan,
            'harga' => $request->harga
        ]);

        return redirect('/layanan')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Layanan::destroy($id);
        return redirect('/layanan')->with('success', 'Data berhasil dihapus');
    }
}
