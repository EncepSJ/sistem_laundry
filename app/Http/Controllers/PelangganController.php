<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required'
        ]);

        Pelanggan::create($request->all());

        return redirect('/pelanggan')->with('success','Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        Pelanggan::findOrFail($id)->update($request->all());
        return redirect('/pelanggan')->with('success','Data diperbarui');
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);
        return redirect('/pelanggan')->with('success','Data dihapus');
    }
}
