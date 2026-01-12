@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4">

    <!-- Header -->
    <div class="mb-6 text-center">
        <h4 class="text-2xl font-bold text-gray-800">Tambah Pelanggan</h4>
        <p class="text-sm text-gray-500">Masukkan data pelanggan baru</p>
    </div>

    <!-- Card Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6">

        <form method="POST" action="/pelanggan" class="space-y-4">
            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Pelanggan
                </label>
                <input type="text"
                       name="nama"
                       required
                       placeholder="Nama lengkap"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    No HP
                </label>
                <input type="text"
                       name="no_hp"
                       required
                       placeholder="08xxxxxxxxxx"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Alamat
                </label>
                <textarea name="alamat"
                          rows="3"
                          placeholder="Alamat lengkap"
                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
            </div>

            <!-- Action -->
            <div class="flex justify-end gap-2 pt-2">
                <a href="/pelanggan"
                   class="px-4 py-2 text-sm font-semibold text-gray-700 border rounded-lg hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                        class="px-5 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>
@endsection
