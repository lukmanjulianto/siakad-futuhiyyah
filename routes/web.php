<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// ===== Area publik (Task 1.3: konten dummy penuh) =====
Route::get('/', [PublicController::class, 'home'])->name('public.home');
Route::get('/cek-siswa', [PublicController::class, 'cekSiswa'])->name('public.cek-siswa');
Route::get('/cek-siswa/hasil', [PublicController::class, 'cekHasil'])->name('public.cek-siswa.hasil');
Route::post('/cek-siswa', fn () => redirect()->route('public.cek-siswa.hasil', ['siswa' => 'ahmad']))->name('public.cek-siswa.submit');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('public.tentang');

// ===== Auth (pratinjau; form penuh di Task 1.4) =====
Route::get('/login', fn () => view('check.auth'))->name('login');

// ===== Dashboard per peran (pratinjau navigasi Task 1.2; konten penuh Task 1.5+) =====
foreach (['admin', 'kepala', 'bk', 'pondok', 'guru'] as $role) {
    Route::get("/{$role}/dashboard", function () use ($role) {
        return view('check.role', [
            'activeRole' => $role,
            'userName' => match ($role) {
                'admin' => 'Administrator',
                'kepala' => 'Ustadz Abdul Halim, M.Pd',
                'bk' => 'Ustadzah Nur Laila, S.Ag',
                'pondok' => 'Ustadz Pengasuh Pondok',
                'guru' => 'Ustadz Muhammad Fauzan, S.Pd.I',
                default => 'Pengguna',
            },
        ]);
    })->name("{$role}.dashboard");
}

// ===== Rute cek lama (kompatibilitas Task 1.1) =====
Route::get('/_check/auth', fn () => view('check.auth'));
Route::get('/_check/app', fn () => view('check.app', ['activeRole' => 'admin']));
