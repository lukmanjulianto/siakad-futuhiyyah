<?php

namespace App\Support;

/** Dummy Fase 1 Users & Pondok. RBAC nyata di Task 2.3/2.4. */
class MasterDummy
{
    public static function roles(): array
    {
        return ['admin' => 'Admin', 'kepala' => 'Kepala Madrasah', 'bk' => 'Guru BK', 'pondok' => 'Pengurus Pondok', 'guru' => 'Guru Mapel'];
    }

    public static function users(): array
    {
        return [
            ['nama' => 'Administrator', 'email' => 'admin@mtsfutuhiyyah.sch.id', 'role' => 'admin', 'status' => 'active', 'login' => '7 Okt 2025 07.10'],
            ['nama' => 'Ustadz Abdul Halim, M.Pd', 'email' => 'abdulhalim@mtsfutuhiyyah.sch.id', 'role' => 'kepala', 'status' => 'active', 'login' => '6 Okt 2025 16.40'],
            ['nama' => 'Ustadzah Nur Laila, S.Ag', 'email' => 'nurlaila@mtsfutuhiyyah.sch.id', 'role' => 'bk', 'status' => 'active', 'login' => '7 Okt 2025 06.55'],
            ['nama' => 'Ustadz Ridwan Pengasuh', 'email' => 'ridwan@mtsfutuhiyyah.sch.id', 'role' => 'pondok', 'status' => 'active', 'login' => '6 Okt 2025 21.05'],
            ['nama' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'email' => 'fauzan@mtsfutuhiyyah.sch.id', 'role' => 'guru', 'status' => 'active', 'login' => '7 Okt 2025 06.30'],
            ['nama' => 'Ustadz Yusuf Maulana, S.Pd', 'email' => 'yusuf@mtsfutuhiyyah.sch.id', 'role' => 'guru', 'status' => 'pending', 'login' => 'Belum pernah'],
            ['nama' => 'Ustadzah Aisyah Baru', 'email' => 'aisyah.baru@gmail.com', 'role' => 'guru', 'status' => 'pending', 'login' => 'Belum pernah'],
            ['nama' => 'Akun Disuspen Contoh', 'email' => 'suspend@mtsfutuhiyyah.sch.id', 'role' => 'guru', 'status' => 'suspended', 'login' => '1 Sep 2025'],
        ];
    }

    public static function pondoks(): array
    {
        return [
            ['nama' => 'Pondok Futuhiyyah Putra', 'gender' => 'Putra', 'pengasuh' => 'KH. Ahmad Fauzi & Ustadz Ridwan', 'santri' => 102, 'alamat' => 'Jl. Pesantren No. 1, Wiradesa, Pekalongan'],
            ['nama' => 'Pondok Futuhiyyah Putri', 'gender' => 'Putri', 'pengasuh' => 'Nyai Hj. Maryam & Ustadzah Fatimah', 'santri' => 84, 'alamat' => 'Jl. Pesantren No. 2, Wiradesa, Pekalongan'],
        ];
    }

    public static function pengurus(): array
    {
        return [
            ['nama' => 'Ustadz Ridwan Hakim', 'pondok' => 'Pondok Futuhiyyah Putra', 'jabatan' => 'Ketua Asrama', 'hp' => '0812-5555-0001', 'status' => 'aktif'],
            ['nama' => 'Ustadz Bilal Syahdan', 'pondok' => 'Pondok Futuhiyyah Putra', 'jabatan' => 'Musyrif Tahfidz', 'hp' => '0812-5555-0002', 'status' => 'aktif'],
            ['nama' => 'Ustadzah Fatimah Zahra', 'pondok' => 'Pondok Futuhiyyah Putri', 'jabatan' => 'Ketua Asrama', 'hp' => '0812-5555-0003', 'status' => 'aktif'],
            ['nama' => 'Ustadzah Nadia Ulfa', 'pondok' => 'Pondok Futuhiyyah Putri', 'jabatan' => 'Musyrifah Bahasa', 'hp' => '0812-5555-0004', 'status' => 'nonaktif'],
        ];
    }
}
