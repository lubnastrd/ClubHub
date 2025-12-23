<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $query = Absensi::with(['user', 'creator'])
            ->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc');

        // Filter berdasarkan tanggal jika ada
        if ($request->has('tanggal') && $request->tanggal) {
            $query->where('tanggal', $request->tanggal);
        }

        // Filter berdasarkan status jika ada
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan user jika ada
        if ($request->has('user_id') && $request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $absensis = $query->paginate(20)->withQueryString();

        $users = User::where('role', 'anggota')->get();

        // Statistik
        $totalAbsensi = Absensi::count();
        $hadirHariIni = Absensi::where('tanggal', today())->where('status', 'hadir')->count();
        $tidakHadirHariIni = Absensi::where('tanggal', today())->where('status', 'tidak_hadir')->count();
        $totalHadir = Absensi::where('status', 'hadir')->count();
        $tingkatKehadiran = $totalAbsensi > 0 ? round(($totalHadir / $totalAbsensi) * 100) : 0;

        return view('clubhub.absensi', compact('absensis', 'users', 'totalAbsensi', 'hadirHariIni', 'tidakHadirHariIni', 'tingkatKehadiran'));
    }

    public function create()
    {
        $users = User::where('role', 'anggota')->orderBy('name', 'asc')->get();
        return view('clubhub.absensi-create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'user_id' => 'required|array',
            'user_id.*' => 'exists:users,id',
            'status' => 'required|array',
            'status.*' => 'in:hadir,tidak_hadir,izin',
            'keterangan' => 'nullable|array',
        ]);

        // Hapus semua absensi lama untuk tanggal yang sama
        Absensi::where('tanggal', $validated['tanggal'])->delete();

        // Simpan absensi baru untuk semua anggota
        foreach ($validated['user_id'] as $index => $userId) {
            Absensi::create([
                'tanggal' => $validated['tanggal'],
                'user_id' => $userId,
                'status' => $validated['status'][$index] ?? 'tidak_hadir',
                'keterangan' => isset($validated['keterangan'][$index]) && !empty(trim($validated['keterangan'][$index])) ? trim($validated['keterangan'][$index]) : null,
                'created_by' => auth()->id(),
            ]);
        }

        return redirect()->route('absensi')->with('success', 'Absensi berhasil dicatat!');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi')->with('success', 'Absensi berhasil dihapus!');
    }
}

