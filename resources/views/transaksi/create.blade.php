@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4">

    <!-- Header -->
    <div class="mb-6 text-center">
        <h4 class="text-2xl font-bold text-gray-800">Tambah Transaksi</h4>
        <p class="text-sm text-gray-500">Input transaksi laundry baru</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6">

        <form action="/transaksi" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Pelanggan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Nama Pelanggan
                </label>
                <input type="text" name="nama_pelanggan" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    No HP
                </label>
                <input type="text" name="no_hp" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Layanan -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Layanan
                </label>
                <select name="layanan_id" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="">-- Pilih Layanan --</option>
                    @foreach($layanan as $l)
                        <option value="{{ $l->id }}">
                            {{ $l->nama_layanan }} - Rp {{ number_format($l->harga) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Berat -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Berat (Kg)
                </label>
                <input type="number" step="0.1" name="berat" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>

            <!-- Pengantaran -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Pengantaran
                </label>
                <select name="diantar" id="diantar" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    <option value="0">Tidak Diantar</option>
                    <option value="1">Diantar</option>
                </select>
            </div>

            <!-- Form Diantar -->
            <div id="form-diantar" class="hidden space-y-4 bg-gray-50 p-4 rounded-xl">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Alamat Pengantaran
                    </label>
                    <textarea name="alamat" rows="3"
                              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Ongkos Kirim
                    </label>
                    <input type="number" name="ongkir" id="ongkir" value="0"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                </div>
            </div>

            <!-- Action -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="/transaksi"
                   class="px-4 py-2 text-sm font-semibold text-gray-700 border rounded-lg hover:bg-gray-100 transition">
                    Kembali
                </a>
                <button type="submit"
                        class="px-6 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                    Simpan
                </button>
            </div>

        </form>

    </div>
</div>

<!-- Script -->
<script>
document.getElementById('diantar').addEventListener('change', function () {
    const formDiantar = document.getElementById('form-diantar');
    const ongkir = document.getElementById('ongkir');

    if (this.value == 1) {
        formDiantar.classList.remove('hidden');
        ongkir.value = 5000; // default ongkir
    } else {
        formDiantar.classList.add('hidden');
        ongkir.value = 0;
    }
});
</script>
@endsection
