@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4">

    <!-- Header -->
    <div class="mb-6 text-center">
        <h4 class="text-2xl font-bold text-gray-800">Detail Transaksi</h4>
        <p class="text-sm text-gray-500">Informasi lengkap transaksi laundry</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

            <div>
                <span class="text-gray-500">No Transaksi</span>
                <p class="font-semibold text-gray-800">
                    {{ $transaksi->no_transaksi }}
                </p>
            </div>

            <div>
                <span class="text-gray-500">Status</span>
                <p>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full
                        @if($transaksi->status=='Diproses') bg-yellow-100 text-yellow-700
                        @elseif($transaksi->status=='Selesai') bg-green-100 text-green-700
                        @elseif($transaksi->status=='Diantar') bg-blue-100 text-blue-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ $transaksi->status }}
                    </span>
                </p>
            </div>

            <div>
                <span class="text-gray-500">Nama Pelanggan</span>
                <p class="font-semibold text-gray-800">
                    {{ $transaksi->pelanggan->nama }}
                </p>
            </div>

            <div>
                <span class="text-gray-500">No HP</span>
                <p class="font-semibold text-gray-800">
                    {{ $transaksi->pelanggan->no_hp }}
                </p>
            </div>

            <div>
                <span class="text-gray-500">Layanan</span>
                <p class="font-semibold text-gray-800">
                    {{ $transaksi->layanan->nama_layanan }}
                </p>
            </div>

            <div>
                <span class="text-gray-500">Berat</span>
                <p class="font-semibold text-gray-800">
                    {{ $transaksi->berat }} kg
                </p>
            </div>

            <div>
                <span class="text-gray-500">Pengantaran</span>
                <p class="font-semibold text-gray-800">
                    {{ $transaksi->diantar ? 'Diantar' : 'Diambil Sendiri' }}
                </p>
            </div>

            @if($transaksi->diantar)
            <div>
                <span class="text-gray-500">Ongkos Kirim</span>
                <p class="font-semibold text-gray-800">
                    Rp {{ number_format($transaksi->ongkir) }}
                </p>
            </div>
            @endif

            <div class="md:col-span-2 bg-gray-50 p-4 rounded-xl">
                <span class="text-gray-500">Total Bayar</span>
                <p class="text-2xl font-bold text-green-600">
                    Rp {{ number_format($transaksi->total) }}
                </p>
            </div>

        </div>
    </div>

    <!-- Action -->
    <div class="flex justify-center mt-6">
        <a href="/transaksi"
           class="px-5 py-2 text-sm font-semibold text-gray-700 border rounded-lg hover:bg-gray-100 transition">
            Kembali
        </a>
    </div>

</div>
@endsection
