@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] bg-gradient-to-br from-slate-50 via-white to-blue-50
            py-6 px-4">

    <div class="max-w-5xl mx-auto">

        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="/dashboard"
               class="inline-flex items-center gap-2
                      bg-slate-700 text-white px-4 py-1.5
                      rounded-lg text-xs font-semibold
                      hover:bg-slate-800 transition">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Header -->
        <div class="mb-6">
            <h3 class="text-2xl font-extrabold text-gray-800">
                Laporan Pendapatan
            </h3>
            <p class="mt-1 text-sm text-blue-600 font-semibold">
                Haji Encep Laundry — Harga Irit, Kualitas Melejit
            </p>
        </div>

        <!-- Summary Card -->
        <div class="mb-6">
            <div class="relative bg-gradient-to-r from-green-500 to-emerald-600
                        rounded-3xl shadow-xl p-6 text-white overflow-hidden">

                <div class="absolute -top-12 -right-12 w-32 h-32
                            bg-white/10 rounded-full"></div>

                <p class="text-xs opacity-90 tracking-wide">
                    Total Pendapatan
                </p>

                <h2 class="text-3xl font-extrabold mt-2">
                    Rp {{ number_format($totalPendapatan) }}
                </h2>

                <p class="mt-1 text-xs opacity-90">
                    Akumulasi seluruh transaksi laundry
                </p>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white/90 backdrop-blur
                    rounded-3xl shadow-lg overflow-hidden">

            <div class="px-6 py-4 border-b flex items-center justify-between">
                <h4 class="text-base font-bold text-gray-800">
                    Pendapatan Harian
                </h4>
                <span class="text-xs text-gray-500">
                    Per tanggal
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold">
                                Tanggal
                            </th>
                            <th class="px-6 py-3 text-left font-semibold">
                                Pendapatan
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach($laporanHarian as $l)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $l->tanggal }}
                                </td>
                                <td class="px-6 py-3 font-bold text-green-600">
                                    Rp {{ number_format($l->pendapatan) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($laporanHarian->isEmpty())
                <div class="text-center py-6 text-gray-500 text-xs">
                    Belum ada data pendapatan
                </div>
            @endif

        </div>

    </div>
</div>
@endsection
