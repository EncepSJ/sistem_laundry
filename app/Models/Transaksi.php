<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'no_transaksi',
        'pelanggan_id',
        'layanan_id',
        'berat',
        'diantar',   // ✅ TAMBAHAN
        'ongkir',    // ✅ TAMBAHAN
        'total',
        'status'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
