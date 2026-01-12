@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4">

    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="/dashboard-pegawai"
           class="inline-flex items-center gap-2
                  bg-slate-700 text-white px-4 py-2
                  rounded-lg text-sm font-semibold
                  hover:bg-slate-800 transition">
            ← Kembali ke Dashboard
        </a>
    </div>

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <div>
            <h4 class="text-2xl font-bold text-gray-800">Data Transaksi</h4>
            <p class="text-sm text-gray-500">Daftar transaksi laundry</p>
        </div>

        <a href="/transaksi/create"
           class="mt-3 md:mt-0 inline-flex items-center gap-2 px-4 py-2
                  bg-indigo-600 text-white text-sm font-semibold
                  rounded-lg shadow hover:bg-indigo-700 transition">
            ➕ Tambah Transaksi
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Kode</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Pelanggan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">No HP</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Pengantaran</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($transaksi as $t)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-3 font-medium text-gray-800">
                                {{ $t->no_transaksi }}
                            </td>
                            <td class="px-6 py-3">
                                {{ $t->pelanggan->nama }}
                            </td>
                            <td class="px-6 py-3 text-gray-700">
                                {{ $t->pelanggan->no_hp }}
                            </td>
                            <td class="px-6 py-3">
                                @if($t->diantar)
                                    <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                        Diantar
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                        Diambil
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-3">
                                <form action="{{ route('transaksi.updateStatus', $t->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                            onchange="this.form.submit()"
                                            class="px-3 py-1 border rounded-lg text-sm
                                                   focus:ring-2 focus:ring-indigo-500">
                                        <option value="Diproses" {{ $t->status=='Diproses' ? 'selected' : '' }}>
                                            Diproses
                                        </option>
                                        <option value="Selesai" {{ $t->status=='Selesai' ? 'selected' : '' }}>
                                            Selesai
                                        </option>

                                        @if($t->diantar)
                                            <option value="Diantar" {{ $t->status=='Diantar' ? 'selected' : '' }}>
                                                Diantar
                                            </option>
                                        @else
                                            <option value="Diambil" {{ $t->status=='Diambil' ? 'selected' : '' }}>
                                                Diambil
                                            </option>
                                        @endif
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-3 space-x-1">
                                <a href="/transaksi/{{ $t->id }}"
                                   class="px-2 py-1 text-xs font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">
                                    Detail
                                </a>
                                <a href="/transaksi/{{ $t->id }}/nota"
                                   class="px-2 py-1 text-xs font-semibold text-white bg-gray-500 rounded hover:bg-gray-600">
                                    Nota
                                </a>

                                <form action="{{ route('transaksi.destroy', $t->id) }}"
                                      method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus transaksi ini?')"
                                            class="px-2 py-1 text-xs font-semibold text-white
                                                   bg-red-500 rounded hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                Belum ada transaksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
