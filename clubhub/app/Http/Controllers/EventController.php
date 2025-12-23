<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('creator')->orderBy('tanggal_mulai', 'desc')->get();
        return view('clubhub.event', compact('events'));
    }

    public function create()
    {
        return view('clubhub.event-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle poster upload
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('event-posters', 'public');
            $validated['poster'] = $posterPath;
        }

        // Tentukan status berdasarkan tanggal
        $status = 'akan_datang';
        $today = now()->toDateString();
        if ($validated['tanggal_mulai'] <= $today && ($validated['tanggal_selesai'] === null || $validated['tanggal_selesai'] >= $today)) {
            $status = 'berlangsung';
        } elseif ($validated['tanggal_selesai'] && $validated['tanggal_selesai'] < $today) {
            $status = 'selesai';
        }

        Event::create([
            ...$validated,
            'status' => $status,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('event')->with('success', 'Event berhasil dibuat!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('clubhub.event-edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);

        // Handle poster upload
        if ($request->hasFile('poster')) {
            // Delete old poster if exists
            if ($event->poster && Storage::disk('public')->exists($event->poster)) {
                Storage::disk('public')->delete($event->poster);
            }
            $posterPath = $request->file('poster')->store('event-posters', 'public');
            $validated['poster'] = $posterPath;
        }

        // Update status
        $status = 'akan_datang';
        $today = now()->toDateString();
        if ($validated['tanggal_mulai'] <= $today && ($validated['tanggal_selesai'] === null || $validated['tanggal_selesai'] >= $today)) {
            $status = 'berlangsung';
        } elseif ($validated['tanggal_selesai'] && $validated['tanggal_selesai'] < $today) {
            $status = 'selesai';
        }

        $event->update([
            ...$validated,
            'status' => $status,
        ]);

        return redirect()->route('event')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Delete poster if exists
        if ($event->poster && Storage::disk('public')->exists($event->poster)) {
            Storage::disk('public')->delete($event->poster);
        }
        
        $event->delete();

        return redirect()->route('event')->with('success', 'Event berhasil dihapus!');
    }
}

