<?php

use Illuminate\Support\Facades\Route;

// ===== Area publik (navigasi persisten Task 1.2; konten penuh di Task 1.3) =====
Route::get('/', fn () => view('check.public'))->name('public.home');
Route::get('/cek-siswa', fn () => view('check.nav', [
    'title' => 'Cek Data Siswa — SIAKAD Futuhiyyah',
    'heading' => 'Formulir Cek Data Siswa (pratinjau navigasi Task 1.2)',
    'desc' => 'Navbar aktif pada menu Cek Data Siswa. Formulir verifikasi NISN/Nama + tanggal lahir + nama ibu kandung dibangun penuh di Task 1.3.',
]))->name('public.cek-siswa');
Route::get('/tentang', fn () => view('check.nav', [
    'title' => 'Tentang Madrasah — SIAKAD Futuhiyyah',
    'heading' => 'Tentang MTs Futuhiyyah (pratinjau navigasi Task 1.2)',
    'desc' => 'Navbar aktif pada menu Tentang. Profil, visi misi, dan kontak dibangun penuh di Task 1.3.',
]))->name('public.tentang');

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
