<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// ===== Area publik (Task 1.3: konten dummy penuh) =====
Route::get('/', [PublicController::class, 'home'])->name('public.home');
Route::get('/cek-siswa', [PublicController::class, 'cekSiswa'])->name('public.cek-siswa');
Route::get('/cek-siswa/hasil', [PublicController::class, 'cekHasil'])->name('public.cek-siswa.hasil');
Route::post('/cek-siswa', fn () => redirect()->route('public.cek-siswa.hasil', ['siswa' => 'ahmad']))->name('public.cek-siswa.submit');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('public.tentang');

// ===== Auth (Task 1.4: UI dummy lengkap, backend Task 2.3) =====
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/lupa-password', [AuthController::class, 'forgot'])->name('password.forgot');
Route::get('/auth/google/redirect', fn () => redirect()->route('admin.dashboard'))->name('oauth.google.redirect');
Route::get('/auth/google/callback', fn () => redirect()->route('admin.dashboard'))->name('oauth.google.callback');

// ===== Dashboard Admin (Task 1.5: dummy penuh) =====
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// ===== Dashboard peran lain (pratinjau Task 1.2; konten penuh Task 1.12+) =====
foreach (['kepala', 'bk', 'pondok', 'guru'] as $role) {
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
