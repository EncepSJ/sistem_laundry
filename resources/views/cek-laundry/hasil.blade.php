<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Laundry | Haji Encep Laundry</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50">

<div class="min-h-screen flex items-center justify-center px-4">

    <!-- Card -->
    <div class="w-full max-w-2xl
                bg-white
                rounded-3xl shadow-2xl p-10 relative">

        <!-- Accent Line -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2
                    w-28 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full"></div>

        <!-- Header -->
        <div class="text-center mb-10 pt-4">
            <h4 class="text-3xl font-extrabold text-gray-800">
                Status Laundry
            </h4>
            <p class="mt-2 text-blue-600 font-semibold">
                Haji Encep Laundry — Harga Irit, Kualitas Melejit
            </p>
        </div>

        <!-- Detail -->
        <div class="space-y-5 text-gray-700">

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold">No Transaksi</span>
                <span class="font-mono text-gray-600">
                    {{ $transaksi->no_transaksi }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold">Nama Pelanggan</span>
                <span>{{ $transaksi->pelanggan->nama }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold">No HP</span>
                <span>{{ $transaksi->pelanggan->no_hp }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold">Layanan</span>
                <span>{{ $transaksi->layanan->nama_layanan }}</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold">Berat Cucian</span>
                <span>{{ $transaksi->berat }} kg</span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-semibold">Total Biaya</span>
                <span class="font-bold text-green-600">
                    Rp {{ number_format($transaksi->total) }}
                </span>
            </div>

            <!-- Status -->
            <div class="flex justify-between items-center pt-6">
                <span class="font-semibold text-lg">Status Laundry</span>

                <span class="px-5 py-2 rounded-full text-sm font-bold
                    @if($transaksi->status == 'Diproses')
                        bg-yellow-100 text-yellow-700
                    @elseif($transaksi->status == 'Selesai')
                        bg-green-100 text-green-700
                    @elseif($transaksi->status == 'Diantar')
                        bg-blue-100 text-blue-700
                    @else
                        bg-gray-100 text-gray-700
                    @endif">
                    {{ $transaksi->status }}
                </span>
            </div>
        </div>

        <!-- Button -->
        <div class="mt-12 text-center">
            <a href="/cek-laundry"
               class="inline-flex items-center gap-2
                      bg-gray-600 text-white px-8 py-3 rounded-xl
                      hover:bg-gray-700 transition font-semibold">
                Cek Laundry Lain
            </a>
        </div>

        <!-- Footer -->
        <div class="mt-10 text-center text-xs text-gray-500">
            © {{ date('Y') }} Haji Encep Laundry
        </div>

    </div>
</div>

</body>
</html>
