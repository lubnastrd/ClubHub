<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Event;
use App\Models\Absensi;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnggota = Anggota::count();
        $anggotaAktif = Anggota::where('status', 'aktif')->count();

        $totalEvent = Event::count();
        $eventBerlangsung = Event::where('status', 'berlangsung')->count();

        $jadwalMingguIni = Jadwal::whereBetween('tanggal', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();

        $totalAbsensi = Absensi::count();
        $hadirHariIni = Absensi::where('tanggal', today())
            ->where('status', 'hadir')
            ->count();
        $totalHadir = Absensi::where('status', 'hadir')->count();
        $tingkatKehadiran = $totalAbsensi > 0
            ? round(($totalHadir / $totalAbsensi) * 100)
            : 0;

        // Recent Activity
        $recentAnggota = Anggota::latest()->take(3)->get();
        $recentJadwal = Jadwal::latest()->take(3)->get();
        $recentEvent = Event::latest()->take(3)->get();
        
        // Data untuk user (bukan admin)
        $userStats = null;
        $eventMendatang = null;
        $jadwalHariIni = null;
        if (auth()->user()->role !== 'admin') {
            $userId = auth()->id();
            $userTotalAbsensi = Absensi::where('user_id', $userId)->count();
            $userHadir = Absensi::where('user_id', $userId)->where('status', 'hadir')->count();
            $userTingkatKehadiran = $userTotalAbsensi > 0 
                ? round(($userHadir / $userTotalAbsensi) * 100) 
                : 0;
            
            $userStats = [
                'total_absensi' => $userTotalAbsensi,
                'hadir' => $userHadir,
                'tingkat_kehadiran' => $userTingkatKehadiran,
            ];
            
            $eventMendatang = Event::where('status', 'akan_datang')
                ->orWhere('status', 'berlangsung')
                ->orderBy('tanggal_mulai', 'asc')
                ->take(3)
                ->get();
            
            $jadwalHariIni = Jadwal::where('tanggal', today())
                ->orderBy('waktu', 'asc')
                ->get();
        }

        return view('dashboard', compact(
            'totalAnggota',
            'anggotaAktif',
            'totalEvent',
            'eventBerlangsung',
            'jadwalMingguIni',
            'tingkatKehadiran',
            'recentAnggota',
            'recentJadwal',
            'recentEvent',
            'userStats',
            'eventMendatang',
            'jadwalHariIni'
        ));
    }
}
