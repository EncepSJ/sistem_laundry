<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Haji Encep Laundry</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

{{-- NAVBAR --}}
<nav class="bg-slate-900 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <span class="text-lg font-semibold tracking-wide">
            Haji Encep Laundry
        </span>

        @auth
        <form action="/logout" method="POST">
            @csrf
            <button class="text-sm px-4 py-2 border border-white rounded
                           hover:bg-white hover:text-slate-900 transition">
                Logout
            </button>
        </form>
        @endauth
    </div>
</nav>

{{-- CONTENT --}}
<main class="flex-1">
    {{-- 
        Jika halaman butuh full layar:
        @section('full')
            konten full
        @endsection
    --}}

    @hasSection('full')
        @yield('full')
    @else
        <div class="max-w-7xl mx-auto px-4 py-6">
            @yield('content')
        </div>
    @endif
</main>

</body>
</html>
