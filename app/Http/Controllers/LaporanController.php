<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;

class LaporanController extends Controller
{
    public function index()
    {
        // TOTAL PENDAPATAN
        $totalPendapatan = TransaksiDetail::sum('subtotal');

        // LAPORAN PER HARI (pakai created_at)
        $laporanHarian = TransaksiDetail::selectRaw(
                'DATE(transaksi.created_at) as tanggal, SUM(subtotal) as pendapatan'
            )
            ->join('transaksi', 'transaksi.id', '=', 'transaksi_detail.transaksi_id')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('laporan.index', compact(
            'totalPendapatan',
            'laporanHarian'
        ));
    }
}
