@extends('layouts.app')

@section('content')
<div class="space-y-6 relative">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-lg shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-2 text-white">Profil Saya</h1>
                    <p class="text-white">Informasi dan statistik pribadi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Profil -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Profil</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <p class="text-gray-900 font-medium">{{ $user->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <p class="text-gray-900 font-medium">{{ $user->email }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <span class="inline-block px-3 py-1 bg-red-100 text-red-800 rounded-full text-sm font-semibold">
                    {{ ucfirst($user->role) }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bergabung</label>
                <p class="text-gray-900 font-medium">{{ $user->created_at->format('d F Y') }}</p>
            </div>
        </div>
    </div>

    <!-- Statistik Absensi -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Total Absensi</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalAbsensi }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Hadir</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $hadir }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Tidak Hadir</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $tidakHadir }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium mb-1">Izin</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $izin }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Tingkat Kehadiran -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tingkat Kehadiran</h2>
        <div class="flex items-center gap-4">
            <div class="flex-1">
                <div class="flex justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700">Persentase Kehadiran</span>
                    <span class="text-sm font-bold text-gray-800">{{ $tingkatKehadiran }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-4 rounded-full transition-all duration-500" style="width: {{ $tingkatKehadiran }}%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Mendatang & Jadwal -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Event Mendatang -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Event Mendatang</h2>
            <div class="space-y-3 max-h-64 overflow-y-auto">
                @if($eventMendatang->count() > 0)
                    @foreach($eventMendatang as $event)
                    <div class="p-3 bg-green-50 rounded-lg border border-green-100">
                        <p class="font-medium text-gray-800">{{ $event->nama }}</p>
                        <p class="text-sm text-gray-600 mt-1">{{ $event->tanggal_mulai->format('d/m/Y') }} - {{ $event->lokasi }}</p>
                        <span class="inline-block mt-2 px-2 py-1 bg-green-100 text-green-800 rounded text-xs font-semibold">
                            {{ ucfirst(str_replace('_', ' ', $event->status)) }}
                        </span>
                    </div>
                    @endforeach
                @else
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Tidak ada event mendatang</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Jadwal Minggu Ini -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Minggu Ini</h2>
            <div class="space-y-3 max-h-64 overflow-y-auto">
                @if($jadwalMingguIni->count() > 0)
                    @foreach($jadwalMingguIni as $jadwal)
                    <div class="p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <p class="font-medium text-gray-800">{{ $jadwal->judul }}</p>
                        <p class="text-sm text-gray-600 mt-1">
                            {{ $jadwal->tanggal->format('d/m/Y') }}
                            @if($jadwal->waktu)
                            - {{ $jadwal->waktu->format('H:i') }}
                            @endif
                        </p>
                        <p class="text-sm text-gray-500 mt-1">{{ $jadwal->lokasi }}</p>
                    </div>
                    @endforeach
                @else
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Tidak ada jadwal minggu ini</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Riwayat Absensi Terbaru -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Riwayat Absensi Terbaru</h2>
            <a href="{{ route('user.absensi') }}" class="text-red-600 hover:text-red-700 text-sm font-medium">
                Lihat Semua →
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if($riwayatAbsensi->count() > 0)
                        @foreach($riwayatAbsensi as $absensi)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                {{ $absensi->tanggal->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'hadir' => 'bg-green-100 text-green-800',
                                        'tidak_hadir' => 'bg-red-100 text-red-800',
                                        'izin' => 'bg-yellow-100 text-yellow-800',
                                    ];
                                    $statusLabels = [
                                        'hadir' => 'Hadir',
                                        'tidak_hadir' => 'Tidak Hadir',
                                        'izin' => 'Izin',
                                    ];
                                @endphp
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusColors[$absensi->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $statusLabels[$absensi->status] ?? ucfirst($absensi->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                {{ $absensi->keterangan ?? '-' }}
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="px-4 py-8 text-center text-sm text-gray-500">
                            Belum ada riwayat absensi
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

