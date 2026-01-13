@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-slate-50 via-white to-blue-50 py-10 px-4">
    <div class="max-w-5xl mx-auto">

        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="/dashboard"
               class="inline-flex items-center gap-2 bg-slate-700 text-white px-5 py-2
                      rounded-lg text-sm font-semibold hover:bg-slate-800 transition">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-10">
            <div>
                <h4 class="text-3xl font-extrabold text-gray-800">Data Layanan</h4>
                <p class="mt-2 text-blue-600 font-semibold">
                    Haji Encep Laundry — Harga Irit, Kualitas Melejit
                </p>
            </div>

            <a href="/layanan/create"
               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl
                      bg-gradient-to-r from-indigo-600 to-blue-600
                      text-white text-sm font-semibold hover:opacity-90 transition shadow-lg">
                + Tambah Layanan
            </a>
        </div>

        <!-- Table -->
        <div class="bg-white/90 backdrop-blur rounded-3xl shadow-xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-bold">Nama Layanan</th>
                        <th class="px-6 py-4 text-left text-sm font-bold">Harga / Kg</th>
                        <th class="px-6 py-4 text-center text-sm font-bold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($layanan as $l)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $l->nama_layanan }}
                            </td>
                            <td class="px-6 py-4 text-green-600 font-bold">
                                Rp {{ number_format($l->harga) }}
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">

                                <!-- Edit -->
                                <a href="{{ route('layanan.edit', $l->id) }}"
                                   class="inline-block px-3 py-1 text-sm rounded-lg
                                          bg-yellow-400 text-white font-semibold
                                          hover:bg-yellow-500 transition">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('layanan.destroy', $l->id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin hapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 text-sm rounded-lg
                                                   bg-red-500 text-white font-semibold
                                                   hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3"
                                class="px-6 py-10 text-center text-gray-500">
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
