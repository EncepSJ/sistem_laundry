@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4">

    <!-- Header Nota -->
    <div class="text-center mb-6">
        <h4 class="text-2xl font-bold text-gray-800">Nota Transaksi</h4>
        <p class="text-sm text-gray-500">Haji Encep Laundry</p>
    </div>

    <!-- Card Nota -->
    <div class="bg-white rounded-2xl shadow-lg p-6">

        <table class="w-full text-sm">
            <tbody class="divide-y">

                <tr>
                    <td class="py-2 font-semibold text-gray-600">No Transaksi</td>
                    <td class="py-2 text-right">{{ $transaksi->no_transaksi }}</td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">Nama Pelanggan</td>
                    <td class="py-2 text-right">{{ $transaksi->pelanggan->nama }}</td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">No HP</td>
                    <td class="py-2 text-right">{{ $transaksi->pelanggan->no_hp }}</td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">Layanan</td>
                    <td class="py-2 text-right">{{ $transaksi->layanan->nama_layanan }}</td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">Berat</td>
                    <td class="py-2 text-right">{{ $transaksi->berat }} kg</td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">Pengantaran</td>
                    <td class="py-2 text-right">
                        {{ $transaksi->diantar ? 'Diantar' : 'Diambil Sendiri' }}
                    </td>
                </tr>

                @if($transaksi->diantar)
                <tr>
                    <td class="py-2 font-semibold text-gray-600">Alamat</td>
                    <td class="py-2 text-right">
                        {{ $transaksi->pelanggan->alamat }}
                    </td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">Ongkir</td>
                    <td class="py-2 text-right">
                        Rp {{ number_format($transaksi->ongkir) }}
                    </td>
                </tr>
                @endif

                <tr class="bg-green-50">
                    <td class="py-3 font-bold text-gray-800">Total Bayar</td>
                    <td class="py-3 text-right font-bold text-green-600 text-lg">
                        Rp {{ number_format($transaksi->total) }}
                    </td>
                </tr>

                <tr>
                    <td class="py-2 font-semibold text-gray-600">Status</td>
                    <td class="py-2 text-right">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                            @if($transaksi->status=='Diproses') bg-yellow-100 text-yellow-700
                            @elseif($transaksi->status=='Selesai') bg-green-100 text-green-700
                            @elseif($transaksi->status=='Diantar') bg-blue-100 text-blue-700
                            @else bg-gray-100 text-gray-700 @endif">
                            {{ $transaksi->status }}
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>

        <!-- Footer -->
        <div class="text-center mt-6 text-xs text-gray-500">
            Terima kasih telah menggunakan jasa kami 🙏
        </div>
    </div>

    <!-- Action -->
    <div class="flex justify-center mt-6 gap-3">
        <a href="/transaksi"
           class="px-5 py-2 text-sm font-semibold text-gray-700 border rounded-lg hover:bg-gray-100 transition">
            Kembali
        </a>

        <button onclick="window.print()"
                class="px-5 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
            Cetak Nota
        </button>
    </div>

</div>
@endsection
