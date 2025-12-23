<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head', ['title' => $title ?? 'ClubHub'])
    <style>
        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar-red {
            background: linear-gradient(180deg, #dc2626 0%, #b91c1c 100%);
        }
        .sidebar-red:hover {
            background: linear-gradient(180deg, #b91c1c 0%, #991b1b 100%);
        }

        /* Futsal Background Pattern */
        .futsal-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 0;
            opacity: 0.03;
            background-image:
                radial-gradient(circle at 20% 50%, #dc2626 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, #b91c1c 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='50' cy='50' r='2' fill='%23dc2626'/%3E%3C/svg%3E");
            background-size: 800px 600px, 800px 600px, 50px 50px;
            background-repeat: no-repeat, no-repeat, repeat;
            background-position: top left, bottom right, center;
            pointer-events: none;
        }

        /* Futsal Silhouette Decoration */
        .futsal-decoration {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: 300px;
            opacity: 0.05;
            background-image: url("data:image/svg+xml,%3Csvg width='300' height='300' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23dc2626'%3E%3Cpath d='M150 250c-15-8-30-15-45-23l-15 30c15 8 30 15 45 23l15-30z'/%3E%3Cpath d='M150 250c15-8 30-15 45-23l15 30c-15 8-30 15-45 23l-15-30z'/%3E%3Ccircle cx='120' cy='220' r='20'/%3E%3Ccircle cx='180' cy='220' r='20'/%3E%3Cpath d='M120 150c0-20 15-35 35-35s35 15 35 35v100h-70V150z'/%3E%3Cpath d='M110 135c-8-15-4-30 8-38l10 18c-8 4-12 12-8 18l-10 2z'/%3E%3Cpath d='M190 135c8-15 4-30-8-38l-10 18c8 4 12 12 8 18l10 2z'/%3E%3C/g%3E%3C/svg%3E");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom right;
            pointer-events: none;
            z-index: 0;
        }

        .main-content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50" style="font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <!-- Futsal Background Pattern -->
    <div class="futsal-pattern"></div>
    <div class="futsal-decoration"></div>

    <!-- Sidebar Utama -->
    <div class="flex min-h-screen">
        <aside class="w-64 sidebar-red text-white h-screen sticky top-0 p-4 space-y-6 shadow-xl overflow-y-auto" style="background: linear-gradient(180deg, #dc2626 0%, #b91c1c 100%);">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 mb-6 pb-4 border-b border-red-600">
                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shadow-md" style="background: white;">
                    <span class="text-red-700 font-bold text-2xl">C</span>
                </div>
                <div>
                    <span class="text-xl font-bold block" style="font-weight: 700;">ClubHub</span>
                    <span class="text-xs text-red-200">Management System</span>
                </div>
            </a>

            <!-- Navigasi Utama -->
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('dashboard') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                @if(auth()->user()->role === 'admin')
                <a href="{{ route('anggota') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('anggota') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('anggota') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="font-medium">Data Anggota</span>
                </a>
                @endif

                <a href="{{ route('jadwal') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('jadwal') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('jadwal') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="font-medium">Jadwal</span>
                </a>

                <a href="{{ route('event') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('event') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('event') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                    </svg>
                    <span class="font-medium">Event</span>
                </a>

                @if(auth()->user()->role === 'admin')
                <a href="{{ route('absensi') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('absensi') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('absensi') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium">Absensi</span>
                </a>
                @else
                <a href="{{ route('user.profile') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('user.profile') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('user.profile') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <span class="font-medium">Profil Saya</span>
                </a>
                <a href="{{ route('user.absensi') }}" class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('user.absensi') ? 'bg-white text-red-700 shadow-lg' : 'hover:bg-red-800 hover:shadow-md' }}" style="{{ request()->routeIs('user.absensi') ? 'background: white; color: #dc2626;' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    <span class="font-medium">Riwayat Absensi</span>
                </a>
                @endif
            </nav>

            <hr class="border-red-600 my-4" />

            <!-- Profil -->
            <div class="mt-auto pt-4 border-t border-red-600">
                <div class="flex items-center gap-3 mb-4 p-3 bg-red-800 rounded-lg">
                    <div class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-red-700 font-bold shadow-md" style="background: white;">
                        {{ auth()->user()->initials() }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-semibold text-sm truncate text-white">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-red-200 truncate">{{ auth()->user()->email }}</div>
                    </div>
                </div>

                <div class="space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-2.5 rounded-lg hover:bg-red-800 transition-all duration-200 text-left">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="font-medium">Log Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Konten Halaman -->
        <main class="flex-1 bg-gray-50 p-6 main-content text-zinc-700">
    @yield('content')
</main>

    </div>

    @fluxScripts

    <!-- Flatpickr for Date/Time Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/id.js"></script>
    <script>
        // Initialize Flatpickr for date inputs
        document.addEventListener('DOMContentLoaded', function() {
            // Date picker - convert type="date" to work with Flatpickr
            const dateInputs = document.querySelectorAll('input[type="date"]');
            dateInputs.forEach(input => {
                // Change type to text for Flatpickr to work
                const originalType = input.type;
                input.type = 'text';

                flatpickr(input, {
                    dateFormat: "Y-m-d",
                    locale: "id",
                    allowInput: false,
                    clickOpens: true,
                    defaultDate: input.value || null,
                    minDate: input.min || null,
                    maxDate: input.max || null,
                });
            });

            // Time picker - convert type="time" to work with Flatpickr
            const timeInputs = document.querySelectorAll('input[type="time"]');
            timeInputs.forEach(input => {
                // Change type to text for Flatpickr to work
                input.type = 'text';

                flatpickr(input, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    allowInput: false,
                    clickOpens: true,
                    defaultDate: input.value || null,
                });
            });
        });
    </script>
</body>
</html>
