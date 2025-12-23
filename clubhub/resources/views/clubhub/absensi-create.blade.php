@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-lg shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-white bg-opacity-20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-2 text-white">Catat Absensi</h1>
                    <p class="text-white">Catat kehadiran anggota untuk latihan atau pertandingan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('absensi.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal *</label>
                <input type="date" id="tanggal" name="tanggal" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900 cursor-pointer" value="{{ date('Y-m-d') }}" style="color: #111827;" placeholder="Klik untuk memilih tanggal">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-4">Status Kehadiran Anggota *</label>
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <div class="max-h-96 overflow-y-auto">
                        @if($users->count() > 0)
                            <table class="w-full">
                                <thead class="bg-gray-50 border-b border-gray-200">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Anggota</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($users as $index => $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">{{ $index + 1 }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span class="text-sm font-medium text-gray-900">{{ $user->name }}</span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <input type="hidden" name="user_id[]" value="{{ $user->id }}">
                                            <select name="status[]" class="w-32 px-2 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900 text-sm" style="color: #111827;" required>
                                                <option value="hadir">Hadir</option>
                                                <option value="tidak_hadir" selected>Tidak Hadir</option>
                                                <option value="izin">Izin</option>
                                            </select>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <input type="text" name="keterangan[]" placeholder="Opsional" class="w-48 px-2 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900 text-sm" style="color: #111827;" maxlength="100">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="p-6 text-center">
                                <p class="text-sm text-gray-500 italic">Belum ada anggota terdaftar. Tambahkan anggota terlebih dahulu.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover:from-red-700 hover:to-red-800 transition-all">
                    Simpan Absensi
                </button>
                <a href="{{ route('absensi') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

