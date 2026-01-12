<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Haji Encep Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-blue-100 to-indigo-200 px-4">

    <!-- Card -->
    <div class="w-full max-w-md bg-white/90 backdrop-blur-xl
                rounded-3xl shadow-2xl p-10 relative">

        <!-- Accent Line -->
        <div class="absolute -top-1 left-1/2 -translate-x-1/2
                    w-24 h-1 rounded-full
                    bg-gradient-to-r from-blue-500 to-indigo-600">
        </div>

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                Haji Encep Laundry
            </h1>

            <p class="text-blue-600 font-semibold mt-1">
                Harga Irit, Kualitas Melejit
            </p>

            <p class="text-sm text-gray-500 mt-3">
                Silakan login untuk melanjutkan ke sistem
            </p>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="mb-6 p-3 rounded-xl bg-red-100 text-red-700 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="/login" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Email
                </label>
                <input type="email" name="email" required
                       placeholder="contoh@email.com"
                       class="w-full px-4 py-3 rounded-xl border border-gray-300
                              focus:ring-2 focus:ring-blue-500 focus:outline-none
                              transition">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Password
                </label>
                <input type="password" name="password" required
                       placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-xl border border-gray-300
                              focus:ring-2 focus:ring-blue-500 focus:outline-none
                              transition">
            </div>

            <!-- Button -->
            <button type="submit"
                    class="w-full py-3 rounded-xl
                           bg-gradient-to-r from-blue-600 to-indigo-600
                           text-white font-bold tracking-wide
                           hover:from-blue-700 hover:to-indigo-700
                           shadow-lg transition">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-500 mt-10">
            © {{ date('Y') }} Haji Encep Laundry
        </p>

    </div>

</body>
</html>
