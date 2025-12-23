<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Event;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Statistik absensi pribadi
        $totalAbsensi = Absensi::where('user_id', $user->id)->count();
        $hadir = Absensi::where('user_id', $user->id)->where('status', 'hadir')->count();
        $tidakHadir = Absensi::where('user_id', $user->id)->where('status', 'tidak_hadir')->count();
        $izin = Absensi::where('user_id', $user->id)->where('status', 'izin')->count();
        $tingkatKehadiran = $totalAbsensi > 0 ? round(($hadir / $totalAbsensi) * 100) : 0;
        
        // Event yang akan datang
        $eventMendatang = Event::where('status', 'akan_datang')
            ->orWhere('status', 'berlangsung')
            ->orderBy('tanggal_mulai', 'asc')
            ->take(5)
            ->get();
        
        // Jadwal minggu ini
        $jadwalMingguIni = Jadwal::whereBetween('tanggal', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->orderBy('tanggal', 'asc')
        ->orderBy('waktu', 'asc')
        ->get();
        
        // Riwayat absensi terbaru
        $riwayatAbsensi = Absensi::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->take(10)
            ->get();
        
        return view('clubhub.user-profile', compact(
            'user',
            'totalAbsensi',
            'hadir',
            'tidakHadir',
            'izin',
            'tingkatKehadiran',
            'eventMendatang',
            'jadwalMingguIni',
            'riwayatAbsensi'
        ));
    }
    
    public function absensi()
    {
        $user = auth()->user();
        
        $absensis = Absensi::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->paginate(20);
        
        // Statistik
        $totalAbsensi = Absensi::where('user_id', $user->id)->count();
        $hadir = Absensi::where('user_id', $user->id)->where('status', 'hadir')->count();
        $tidakHadir = Absensi::where('user_id', $user->id)->where('status', 'tidak_hadir')->count();
        $izin = Absensi::where('user_id', $user->id)->where('status', 'izin')->count();
        $tingkatKehadiran = $totalAbsensi > 0 ? round(($hadir / $totalAbsensi) * 100) : 0;
        
        return view('clubhub.user-absensi', compact(
            'absensis',
            'totalAbsensi',
            'hadir',
            'tidakHadir',
            'izin',
            'tingkatKehadiran'
        ));
    }
}

