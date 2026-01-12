@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-slate-50 via-white to-blue-50
            py-10 px-4">

    <div class="max-w-5xl mx-auto">

        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="/dashboard"
               class="inline-flex items-center gap-2
                      bg-slate-700 text-white px-5 py-2
                      rounded-lg text-sm font-semibold
                      hover:bg-slate-800 transition">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
            <div>
                <h4 class="text-3xl font-extrabold text-gray-800">
                    Data Layanan
                </h4>
                <p class="mt-2 text-blue-600 font-semibold">
                    Haji Encep Laundry — Harga Irit, Kualitas Melejit
                </p>
            </div>

            <a href="/layanan/create"
               class="inline-flex items-center gap-2
                      px-6 py-3 rounded-xl
                      bg-gradient-to-r from-indigo-600 to-blue-600
                      text-white text-sm font-semibold
                      hover:opacity-90 transition shadow-lg">
                + Tambah Layanan
            </a>
        </div>

        <!-- Table Card -->
        <div class="bg-white/90 backdrop-blur
                    rounded-3xl shadow-xl overflow-hidden">

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-8 py-4 text-left text-sm font-bold">
                            Nama Layanan
                        </th>
                        <th class="px-8 py-4 text-left text-sm font-bold">
                            Harga / Kg
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($layanan as $l)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-8 py-4 font-semibold text-gray-800">
                                {{ $l->nama_layanan }}
                            </td>
                            <td class="px-8 py-4 text-green-600 font-bold">
                                Rp {{ number_format($l->harga) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2"
                                class="px-8 py-10 text-center text-gray-500">
                                Data layanan belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
