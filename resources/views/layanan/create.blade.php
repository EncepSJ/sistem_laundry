@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-4 py-4">

    <!-- Header -->
    <div class="mb-4">
        <div class="flex items-center gap-2 mb-0.5">
            <div class="bg-indigo-600 text-white p-1.5 rounded-md shadow">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-3.5 h-3.5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <h4 class="text-lg font-bold text-gray-800">
                Tambah Layanan
            </h4>
        </div>
        <p class="text-[11px] text-gray-500">
            Tambah layanan laundry baru
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-md p-4">

        <form method="POST" action="/layanan" class="space-y-3">
            @csrf

            <!-- Nama Layanan -->
            <div>
                <label class="block text-[11px] font-medium text-gray-600 mb-0.5">
                    Nama Layanan
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-3.5 h-3.5"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 7h10M7 12h10M7 17h10" />
                        </svg>
                    </span>
                    <input
                        type="text"
                        name="nama_layanan"
                        placeholder="Cuci Kering"
                        required
                        class="w-full pl-8 py-1.5 rounded-md border-gray-300
                               focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                    >
                </div>
            </div>

            <!-- Harga -->
            <div>
                <label class="block text-[11px] font-medium text-gray-600 mb-0.5">
                    Harga / Kg
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2.5 text-gray-400 text-xs">
                        Rp
                    </span>
                    <input
                        type="number"
                        name="harga"
                        placeholder="7000"
                        required
                        class="w-full pl-8 py-1.5 rounded-md border-gray-300
                               focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                    >
                </div>
            </div>

            <!-- Button -->
            <div class="flex justify-end gap-2 pt-2">
                <a href="/layanan"
                   class="px-3 py-1.5 rounded-md border border-gray-300
                          text-gray-600 hover:bg-gray-100 transition text-xs">
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-1.5
                           bg-indigo-600 text-white rounded-md
                           font-semibold hover:bg-indigo-700 transition text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-3.5 h-3.5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
