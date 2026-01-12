@extends('layouts.app')

@section('content')
<div class="min-h-[75vh] bg-gradient-to-br from-slate-50 via-white to-yellow-50 py-8 px-4">

    <!-- Header Dashboard -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
            Dashboard Pegawai
        </h1>

        <p class="mt-2 text-base text-gray-600">
            <span class="font-semibold text-yellow-600">Haji Encep Laundry</span> —
            Harga Irit, Kualitas Melejit ✨
        </p>
    </div>

    <!-- Card Container -->
    <div class="flex justify-center">

        <!-- Card Transaksi -->
        <div class="group relative bg-white/80 backdrop-blur
                    border border-gray-200 rounded-3xl shadow-lg
                    p-8 w-full max-w-sm
                    hover:shadow-xl transition-all duration-300">

            <!-- Accent Line -->
            <div class="absolute -top-1 left-1/2 -translate-x-1/2
                        w-20 h-1 rounded-full
                        bg-gradient-to-r from-yellow-400 to-orange-500">
            </div>

            <!-- Icon -->
            <div class="flex justify-center mb-5">
                <div class="bg-yellow-100 text-yellow-600
                            p-4 rounded-2xl
                            group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-10 h-10"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 3h6a2 2 0 012 2v14l-5-3-5 3V5a2 2 0 012-2z" />
                    </svg>
                </div>
            </div>

            <!-- Content -->
            <h3 class="text-xl font-bold text-gray-800 text-center">
                Transaksi Laundry
            </h3>

            <p class="text-gray-500 text-center mt-2 text-sm">
                Catat transaksi laundry masuk dan proses cucian pelanggan
            </p>

            <!-- Button -->
            <div class="flex justify-center mt-6">
                <a href="/transaksi"
                   class="inline-flex items-center gap-2
                          bg-gradient-to-r from-yellow-500 to-orange-500
                          text-white px-6 py-2.5 rounded-xl font-semibold
                          hover:opacity-90 transition text-sm">
                    Masuk Transaksi
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
