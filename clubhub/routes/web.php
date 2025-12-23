<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserProfileController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Halaman Settings (Laravel Fortify)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

/*
|--------------------------------------------------------------------------
| Halaman ClubHub (Custom Pages)
|--------------------------------------------------------------------------
|
| Semua halaman custom (anggota, jadwal, event, absensi)
| disimpan di resources/views/clubhub/
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Anggota Routes
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota');
    Route::middleware('admin')->group(function () {
        Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
        Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
        Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
        Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
        Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
    });

    // Jadwal Routes
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::middleware('admin')->group(function () {
        Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
        Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
        Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
        Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
        Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    });

    // Event Routes
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::middleware('admin')->group(function () {
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event', [EventController::class, 'store'])->name('event.store');
        Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
        Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
        Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    });

    // Absensi Routes
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::middleware('admin')->group(function () {
        Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
        Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
        Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
    });
    
    // User Profile Routes (untuk user biasa)
    Route::get('/profil', [UserProfileController::class, 'index'])->name('user.profile');
    Route::get('/riwayat-absensi', [UserProfileController::class, 'absensi'])->name('user.absensi');
});
