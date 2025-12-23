<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ClubHub - Futsal Management' }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .futsal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.05;
            background-image: url("data:image/svg+xml,%3Csvg width='800' height='600' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cpath d='M200 300c0-55 45-100 100-100s100 45 100 100-45 100-100 100-100-45-100-100zm400 0c0-55 45-100 100-100s100 45 100 100-45 100-100 100-100-45-100-100z' fill='%23000'/%3E%3Cpath d='M150 250h500v100H150z' fill='%23000'/%3E%3Ccircle cx='400' cy='300' r='80' fill='%23000'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 800px 600px;
            background-repeat: repeat;
            background-position: center;
        }

        .futsal-silhouette {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 500px;
            height: 500px;
            opacity: 0.08;
            background-image: url("data:image/svg+xml,%3Csvg width='500' height='500' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23dc2626'%3E%3Cpath d='M250 400c-20-10-40-20-60-30l-20 40c20 10 40 20 60 30l20-40z'/%3E%3Cpath d='M250 400c20-10 40-20 60-30l20 40c-20 10-40 20-60 30l-20-40z'/%3E%3Ccircle cx='200' cy='350' r='30'/%3E%3Ccircle cx='300' cy='350' r='30'/%3E%3Cpath d='M200 200c0-30 20-50 50-50s50 20 50 50v150h-100V200z'/%3E%3Cpath d='M180 180c-10-20-5-40 10-50l15 25c-10 5-15 15-10 25l-15 0z'/%3E%3Cpath d='M320 180c10-20 5-40-10-50l-15 25c10 5 15 15 10 25l15 0z'/%3E%3C/g%3E%3C/svg%3E");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom right;
            pointer-events: none;
        }

        .auth-container {
            position: relative;
            z-index: 1;
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            pointer-events: none;
        }

        .circle-1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            top: -150px;
            right: -150px;
        }

        .circle-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            bottom: -100px;
            left: -100px;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
    <!-- Background Pattern -->
    <div class="futsal-bg"></div>

    <!-- Decorative Circles -->
    <div class="decorative-circle circle-1"></div>
    <div class="decorative-circle circle-2"></div>

    <!-- Futsal Silhouette -->
    <div class="futsal-silhouette"></div>

    <div class="min-h-screen flex items-center justify-center p-4 auth-container">
        <div class="w-full max-w-md">
            <!-- Logo Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-red-600 to-red-700 rounded-2xl shadow-lg mb-4">
                    <span class="text-white text-4xl font-bold">C</span>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">ClubHub</h1>
                <p class="text-gray-600">Futsal Management System</p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="text-center mt-6 text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} ClubHub. All rights reserved.</p>
            </div>
        </div>
    </div>

    @fluxScripts
</body>
</html>
