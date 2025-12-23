<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClubHub - Futsal Management System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            red: '#D90429', // Merah sesuai logo
                            dark: '#1b1b18',
                            gray: '#8D8D8D',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* CSS Tambahan untuk meniru background shape abstrak di gambar */
        body {
            background-color: #f9fafb;
            overflow-x: hidden;
        }
        .bg-shape-left {
            position: absolute;
            left: -10%;
            top: 40%;
            width: 400px;
            height: 400px;
            background: #e5e7eb; /* Zinc-200 */
            border-radius: 50%;
            opacity: 0.5;
            z-index: -1;
        }
        .bg-shape-right {
            position: absolute;
            right: -10%;
            top: 40%;
            width: 400px;
            height: 400px;
            background: #e5e7eb;
            border-radius: 50%;
            opacity: 0.5;
            z-index: -1;
        }
        .bg-connector {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(90deg, transparent 0%, #f3f4f6 20%, #f3f4f6 80%, transparent 100%);
            transform: translateY(-50%);
            z-index: -2;
        }
    </style>
</head>
<body class="antialiased text-brand-dark min-h-screen flex flex-col items-center justify-center relative">

    <div class="bg-shape-left hidden lg:block"></div>
    <div class="bg-shape-right hidden lg:block"></div>
    <div class="bg-connector hidden lg:block"></div>

    <div class="w-full max-w-md px-6 z-10">

        <div class="text-center mb-8">
            <div class="mx-auto bg-brand-red w-16 h-16 rounded-2xl flex items-center justify-center mb-4 shadow-lg shadow-red-200">
                <span class="text-white text-3xl font-bold">C</span>
            </div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">ClubHub</h1>
            <p class="text-brand-gray text-sm mt-1">Futsal Management System</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">

            @if (Route::has('login'))
                @auth
                    <div class="text-center">
                        <h2 class="text-2xl font-bold mb-2">Selamat Datang Kembali!</h2>
                        <p class="text-gray-500 mb-6 text-sm">Anda sudah masuk ke dalam sistem.</p>

                        <a href="{{ url('/dashboard') }}" class="block w-full bg-brand-red hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-xl transition duration-200 shadow-md mb-3">
                            Ke Dashboard
                        </a>
                    </div>
                @else
                    <div class="text-center mb-6">
                        <h2 class="text-2xl font-bold mb-2">Selamat Datang</h2>
                        <p class="text-gray-500 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div class="text-left">
                            <label for="email" class="block text-xs font-bold text-gray-700 mb-1 ml-1">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm placeholder-gray-400"
                                placeholder="email@example.com" required>
                        </div>

                        <div class="text-left">
                            <div class="flex justify-between items-center mb-1 ml-1">
                                <label for="password" class="block text-xs font-bold text-gray-700">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs text-brand-red hover:text-red-800 font-medium">Lupa password?</a>
                                @endif
                            </div>
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-brand-red focus:ring-2 focus:ring-red-200 outline-none transition-all text-sm placeholder-gray-400"
                                placeholder="Masukkan password" required>
                        </div>

                        <div class="flex items-center text-left">
                            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-brand-red border-gray-300 rounded focus:ring-brand-red">
                            <label for="remember" class="ml-2 text-sm text-gray-600 font-medium">Ingat saya</label>
                        </div>

                        <button type="submit" class="w-full bg-brand-red hover:bg-red-700 text-white font-bold py-3 px-4 rounded-xl transition duration-200 shadow-lg shadow-red-200 mt-2">
                            Masuk
                        </button>
                    </form>

                    @if (Route::has('register'))
                        <div class="mt-6 text-center text-sm">
                            <span class="text-gray-500">Belum punya akun?</span>
                            <a href="{{ route('register') }}" class="text-brand-red font-bold hover:underline ml-1">Daftar sekarang</a>
                        </div>
                    @endif
                @endauth
            @endif

        </div>

        <footer class="mt-8 text-center">
            <p class="text-gray-400 text-xs font-medium">
                &copy; {{ date('Y') }} ClubHub. All rights reserved.
            </p>
        </footer>
    </div>

</body>
</html>
