<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::with('creator')->orderBy('created_at', 'desc')->get();
        return view('clubhub.anggota', compact('anggotas'));
    }

    public function create()
    {
        return view('clubhub.anggota-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|unique:anggotas,email',
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'posisi' => 'nullable|string|max:50',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat akun user untuk login anggota
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'anggota',
            'email_verified_at' => now(),
        ]);

        // Simpan data anggota
        Anggota::create([
            ...collect($validated)->except(['password', 'password_confirmation'])->toArray(),
            'status' => 'aktif',
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('anggota')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('clubhub.anggota-edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'posisi' => 'nullable|string|max:50',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validated);

        return redirect()->route('anggota')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota')->with('success', 'Anggota berhasil dihapus!');
    }
}

