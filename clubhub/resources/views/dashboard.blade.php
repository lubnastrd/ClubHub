@extends('layouts.app')

@section('content')
<div class="space-y-6 relative">
    <!-- Header Welcome -->
    <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-lg shadow-lg p-8 text-white relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mr-32 -mt-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full -ml-24 -mb-24"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 01.557 1.08l1.524 4.907a1 1 0 01-1.838.788l-1.524-4.907a1 1 0 00-.557-1.08l-1.94-.831a1 1 0 01-.788-1.838l4-1.714a1 1 0 01.356-.257l7-3a1 1 0 00.394-1.84z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-bold mb-2 text-White">Selamat Datang di ClubHub</h1>
                    <p class="text-white text-lg">Sistem Manajemen Organisasi yang Terintegrasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Utama -->
    <div class="grid grid-cols-1 md:grid-cols-{{ auth()->user()->role === 'admin' ? '4' : '4' }} gap-6">
        @if(auth()->user()->role === 'admin')
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-600 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Anggota</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalAnggota }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $anggotaAktif }} anggota aktif</p>
                </div>
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-600 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Tingkat Kehadiran</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $userStats['tingkat_kehadiran'] ?? 0 }}%</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $userStats['hadir'] ?? 0 }} dari {{ $userStats['total_absensi'] ?? 0 }} kehadiran</p>
                </div>
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Event</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalEvent }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $eventBerlangsung }} sedang berlangsung</p>
                </div>
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-600 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Jadwal Minggu Ini</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $jadwalMingguIni }}</p>
                    <p class="text-xs text-gray-500 mt-1">Kegiatan</p>
                </div>
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        @if(auth()->user()->role === 'admin')
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-600 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Tingkat Kehadiran</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $tingkatKehadiran }}%</p>
                    <p class="text-xs text-gray-500 mt-1">Rata-rata</p>
                </div>
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-600 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Absensi</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $userStats['total_absensi'] ?? 0 }}</p>
                    <p class="text-xs text-gray-500 mt-1">Catatan kehadiran</p>
                </div>
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 {{ auth()->user()->role === 'admin' ? 'md:grid-cols-2' : 'md:grid-cols-1' }} gap-6">
        @if(auth()->user()->role === 'admin')
        <!-- Quick Access -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                </svg>
                Akses Cepat
            </h2>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('anggota') }}" class="bg-red-50 hover:bg-red-100 border border-red-200 rounded-lg p-4 text-center transition-colors">
                    <div class="text-3xl mb-2">👥</div>
                    <div class="text-sm font-semibold text-red-700">Data Anggota</div>
                </a>
                <a href="{{ route('jadwal') }}" class="bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-lg p-4 text-center transition-colors">
                    <div class="text-3xl mb-2">📅</div>
                    <div class="text-sm font-semibold text-blue-700">Jadwal</div>
                </a>
                <a href="{{ route('event') }}" class="bg-green-50 hover:bg-green-100 border border-green-200 rounded-lg p-4 text-center transition-colors">
                    <div class="text-3xl mb-2">🎫</div>
                    <div class="text-sm font-semibold text-green-700">Event</div>
                </a>
                <a href="{{ route('absensi') }}" class="bg-yellow-50 hover:bg-yellow-100 border border-yellow-200 rounded-lg p-4 text-center transition-colors">
                    <div class="text-3xl mb-2">✅</div>
                    <div class="text-sm font-semibold text-yellow-700">Absensi</div>
                </a>
            </div>
        </div>
        @endif

        <!-- Recent Activity / Jadwal / Event Mendatang -->
        @if(auth()->user()->role === 'admin')
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                </svg>
                Aktivitas Terkini
            </h2>
            <div class="space-y-3 max-h-64 overflow-y-auto">
                @if($recentAnggota->count() > 0)
                    @foreach($recentAnggota as $anggota)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Anggota baru: {{ $anggota->name }}</p>
                            <p class="text-xs text-gray-500">{{ $anggota->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif

                @if($recentJadwal->count() > 0)
                    @foreach($recentJadwal as $jadwal)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Jadwal: {{ $jadwal->judul }}</p>
                            <p class="text-xs text-gray-500">{{ $jadwal->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif

                @if($recentEvent->count() > 0)
                    @foreach($recentEvent as $event)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">Event: {{ $event->nama }}</p>
                            <p class="text-xs text-gray-500">{{ $event->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif

                @if($recentAnggota->count() === 0 && $recentJadwal->count() === 0 && $recentEvent->count() === 0)
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Belum ada aktivitas terkini</p>
                </div>
                @endif
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                Jadwal Hari Ini
            </h2>
            <div class="space-y-3 max-h-48 overflow-y-auto mb-6">
                @if($jadwalHariIni && $jadwalHariIni->count() > 0)
                    @foreach($jadwalHariIni as $jadwal)
                    <div class="flex items-center p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">{{ $jadwal->judul }}</p>
                            <p class="text-xs text-gray-500">{{ $jadwal->waktu ? $jadwal->waktu->format('H:i') : '-' }} - {{ $jadwal->lokasi }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Tidak ada jadwal hari ini</p>
                </div>
                @endif
            </div>

            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center mt-6">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                </svg>
                Event Mendatang
            </h2>
            <div class="space-y-3 max-h-48 overflow-y-auto">
                @if($eventMendatang && $eventMendatang->count() > 0)
                    @foreach($eventMendatang as $event)
                    <div class="flex items-center p-3 bg-green-50 rounded-lg border border-green-100">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-800">{{ $event->nama }}</p>
                            <p class="text-xs text-gray-500">{{ $event->tanggal_mulai->format('d/m/Y') }} - {{ $event->lokasi }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Tidak ada event mendatang</p>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
@endsection
