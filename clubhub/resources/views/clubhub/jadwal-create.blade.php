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
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-2 text-white">Tambah Jadwal</h1>
                    <p class="text-white">Tambahkan jadwal latihan atau pertandingan baru</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Jadwal *</label>
                <input type="text" id="judul" name="judul" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900" placeholder="Contoh: Latihan Rutin Mingguan" style="color: #111827;">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal *</label>
                    <input type="date" id="tanggal" name="tanggal" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900 cursor-pointer" style="color: #111827;" placeholder="Klik untuk memilih tanggal">
                </div>
                <div>
                    <label for="waktu" class="block text-sm font-medium text-gray-700 mb-2">Waktu *</label>
                    <input type="time" id="waktu" name="waktu" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900 cursor-pointer" style="color: #111827;" placeholder="Klik untuk memilih waktu">
                </div>
            </div>

            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">Lokasi *</label>
                <input type="text" id="lokasi" name="lokasi" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900" placeholder="Contoh: Lapangan Futsal ABC" style="color: #111827;">
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 text-gray-900" placeholder="Tambahkan catatan atau informasi tambahan..." style="color: #111827;"></textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover:from-red-700 hover:to-red-800 transition-all">
                    Simpan Jadwal
                </button>
                <a href="{{ route('jadwal') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

