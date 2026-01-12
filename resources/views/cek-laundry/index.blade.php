<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Laundry | Haji Encep Laundry</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen w-full">

<div class="min-h-screen w-full flex items-center justify-center
            bg-[url('/image/laundry.png')]
            bg-cover bg-center relative
            px-4 sm:px-6 lg:px-8">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Card -->
    <div class="relative w-full
                max-w-sm sm:max-w-md lg:max-w-lg
                bg-white/95 backdrop-blur
                rounded-3xl shadow-2xl overflow-hidden">

        <!-- Accent Line -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2
                    w-24 h-1 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full"></div>

        <!-- Header -->
        <div class="text-center pt-10 pb-6 px-6 sm:px-8">
            <h3 class="text-2xl sm:text-3xl font-extrabold text-gray-800">
                Haji Encep Laundry
            </h3>
            <p class="text-blue-600 font-semibold mt-1">
                Harga Irit, Kualitas Melejit
            </p>
            <p class="text-sm text-gray-500 mt-3">
                Cek status cucian Anda secara mudah & cepat
            </p>
        </div>

        <!-- Content -->
        <div class="px-6 sm:px-8 pb-8">

            @if(session('error'))
                <div class="mb-5 p-3 rounded-xl bg-red-100 text-red-700 text-sm text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('cek-laundry.cek') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Kode Transaksi
                    </label>
                    <input type="text"
                           name="no_transaksi"
                           placeholder="Contoh: TRX-00123"
                           required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300
                                  focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <button type="submit"
                        class="w-full py-3 rounded-xl
                               bg-gradient-to-r from-blue-600 to-indigo-600
                               text-white font-bold
                               hover:from-blue-700 hover:to-indigo-700
                               shadow-lg transition active:scale-95">
                    Cek Status Laundry
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 text-center text-xs text-gray-500 py-4">
            © {{ date('Y') }} Haji Encep Laundry
        </div>

    </div>
</div>

</body>
</html>
