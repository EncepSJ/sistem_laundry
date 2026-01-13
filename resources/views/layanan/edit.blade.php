@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8">

    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-1">
            <div class="bg-indigo-600 text-white p-2 rounded-lg shadow">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <h4 class="text-2xl font-bold text-gray-800">
                Edit Layanan
            </h4>
        </div>
        <p class="text-sm text-gray-500">
            Perbarui data layanan laundry
        </p>
    </div>

    <!-- Card Form -->
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <form method="POST" action="{{ route('layanan.update', $layanan->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Layanan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Layanan
                </label>
                <input
                    type="text"
                    name="nama_layanan"
                    value="{{ old('nama_layanan', $layanan->nama_layanan) }}"
                    required
                    class="w-full rounded-lg border-gray-300
                           focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            <!-- Harga -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Harga / Kg
                </label>
                <input
                    type="number"
                    name="harga"
                    value="{{ old('harga', $layanan->harga) }}"
                    required
                    class="w-full rounded-lg border-gray-300
                           focus:border-indigo-500 focus:ring-indigo-500"
                >
            </div>

            <!-- Button -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('layanan.index') }}"
                   class="px-5 py-2 rounded-lg border border-gray-300
                          text-gray-700 hover:bg-gray-100 transition">
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2
                           bg-indigo-600 text-white rounded-lg
                           font-semibold hover:bg-indigo-700 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
