@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 py-8 px-4">

    <!-- Header -->
    <div class="text-center mb-10">
        <div class="flex justify-center items-center gap-3 mb-3">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600
                        text-white p-3 rounded-2xl shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-7 h-7"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                Dashboard Admin
            </h1>
        </div>

        <p class="text-base text-blue-600 font-semibold">
            Haji Encep Laundry — Harga Irit, Kualitas Melejit ✨
        </p>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">

        <!-- Layanan -->
        <div class="group bg-white/80 backdrop-blur border border-gray-200
                    rounded-3xl shadow-md hover:shadow-xl transition p-8 text-center">

            <div class="bg-emerald-100 text-emerald-600
                        p-4 rounded-2xl inline-block
                        group-hover:scale-105 transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>

            <h3 class="text-xl font-bold text-gray-800 mt-5">
                Layanan & Harga
            </h3>

            <p class="text-gray-500 mt-2 text-sm">
                Kelola layanan laundry dan tarif
            </p>

            <a href="/layanan"
               class="inline-flex items-center gap-2 mt-6
                      bg-gradient-to-r from-emerald-600 to-green-500
                      text-white px-6 py-2.5 rounded-xl font-semibold
                      hover:opacity-90 transition">
                Kelola
            </a>
        </div>

        <!-- Laporan -->
        <div class="group bg-white/80 backdrop-blur border border-gray-200
                    rounded-3xl shadow-md hover:shadow-xl transition p-8 text-center">

            <div class="bg-blue-100 text-blue-600
                        p-4 rounded-2xl inline-block
                        group-hover:scale-105 transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 3v18m4-14v14m4-10v10M7 9v12" />
                </svg>
            </div>

            <h3 class="text-xl font-bold text-gray-800 mt-5">
                Laporan Pendapatan
            </h3>

            <p class="text-gray-500 mt-2 text-sm">
                Pendapatan harian & bulanan
            </p>

            <a href="/laporan"
               class="inline-flex items-center gap-2 mt-6
                      bg-gradient-to-r from-blue-600 to-indigo-500
                      text-white px-6 py-2.5 rounded-xl font-semibold
                      hover:opacity-90 transition">
                Lihat
            </a>
        </div>

    </div>
</div>
@endsection
