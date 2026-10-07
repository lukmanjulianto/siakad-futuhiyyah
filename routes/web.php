<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AkademikController;
use App\Http\Controllers\Admin\GtkController;
use App\Http\Controllers\Admin\OperasionalController;
use App\Http\Controllers\Admin\PelanggaranController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Kepala\KepalaController;
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

// ===== Kelola Siswa (Task 1.6: dummy + wizard 6 tab) =====
Route::get('/admin/siswa', [StudentController::class, 'index'])->name('admin.siswa.index');
Route::get('/admin/siswa/create', [StudentController::class, 'create'])->name('admin.siswa.create');
Route::get('/admin/siswa/{id}/edit', [StudentController::class, 'edit'])->name('admin.siswa.edit');
Route::get('/admin/siswa/{id}', [StudentController::class, 'show'])->name('admin.siswa.show');

// ===== Mutasi (Task 1.7: dummy) =====
Route::get('/admin/mutasi/masuk', [StudentController::class, 'mutasiMasuk'])->name('admin.mutasi.masuk');
Route::get('/admin/mutasi/keluar', [StudentController::class, 'mutasiKeluar'])->name('admin.mutasi.keluar');

// ===== GTK (Task 1.8: dummy + 2 tab) =====
Route::get('/admin/gtk', [GtkController::class, 'index'])->name('admin.gtk.index');
Route::get('/admin/gtk/create', [GtkController::class, 'create'])->name('admin.gtk.create');
Route::get('/admin/gtk/{id}/edit', [GtkController::class, 'edit'])->name('admin.gtk.edit');

// ===== Akademik (Task 1.9: dummy) =====
Route::get('/admin/akademik/kelas', [AkademikController::class, 'kelas'])->name('admin.akademik.kelas');
Route::get('/admin/akademik/naik-kelas', [AkademikController::class, 'naikKelas'])->name('admin.akademik.naik-kelas');
Route::get('/admin/akademik/mapel', [AkademikController::class, 'mapel'])->name('admin.akademik.mapel');
Route::get('/admin/akademik/jadwal', [AkademikController::class, 'jadwal'])->name('admin.akademik.jadwal');
Route::get('/admin/akademik/jadwal/{template}/setting', [AkademikController::class, 'jadwalSetting'])->name('admin.akademik.jadwal.setting');

// ===== Pelanggaran (Task 1.10: dummy) =====
Route::get('/admin/pelanggaran/kategori', [PelanggaranController::class, 'kategori'])->name('admin.pelanggaran.kategori');
Route::get('/admin/pelanggaran/data', [PelanggaranController::class, 'data'])->name('admin.pelanggaran.data');

// ===== Absensi & Laporan (Task 1.11: dummy) =====
Route::get('/admin/absensi', [OperasionalController::class, 'absensi'])->name('admin.absensi.index');
Route::get('/admin/laporan', [OperasionalController::class, 'laporan'])->name('admin.laporan.index');

// ===== Kepala Madrasah (Task 1.12: dummy) =====
Route::get('/kepala/dashboard', [KepalaController::class, 'dashboard'])->name('kepala.dashboard');
Route::get('/kepala/laporan', [KepalaController::class, 'laporan'])->name('kepala.laporan');
Route::get('/kepala/monitoring', [KepalaController::class, 'monitoring'])->name('kepala.monitoring');

// ===== Dashboard peran lain (pratinjau Task 1.2; konten penuh Task 1.13+) =====
foreach (['bk', 'pondok', 'guru'] as $role) {
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
