<?php

namespace App\Support;

/**
 * Dummy Fase 1 untuk Dashboard Admin (PRD Task 1.5).
 * Diganti query nyata di Task 2.13.
 */
class AdminDummy
{
    public static function cards(): array
    {
        return [
            ['icon' => 'bi-people-fill', 'value' => '318', 'label' => 'Total Santri', 'sub' => '6 mutasi masuk semester ini', 'color' => 'bg-futuhiyyah'],
            ['icon' => 'bi-person-check-fill', 'value' => '312', 'label' => 'Santri Aktif', 'sub' => '98% dari total', 'color' => 'bg-success'],
            ['icon' => 'bi-person-badge-fill', 'value' => '28', 'label' => 'Guru & Tendik', 'sub' => '24 guru • 4 tendik', 'color' => 'bg-info'],
            ['icon' => 'bi-door-open-fill', 'value' => '9', 'label' => 'Kelas', 'sub' => 'VII-A s.d. IX-C', 'color' => 'bg-warning'],
            ['icon' => 'bi-book-half', 'value' => '16', 'label' => 'Mapel', 'sub' => 'Agama, umum & mulok', 'color' => 'bg-secondary'],
        ];
    }

    /** Kehadiran per jenjang 7 hari; Jumat = libur (null). */
    public static function attendance(): array
    {
        return [
            'days' => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            'series' => [
                ['name' => 'Kelas VII', 'data' => [94, 96, 95, 93, null, 97, 90]],
                ['name' => 'Kelas VIII', 'data' => [95, 93, 96, 94, null, 95, 89]],
                ['name' => 'Kelas IX', 'data' => [92, 94, 93, 95, null, 94, 88]],
            ],
        ];
    }

    public static function activities(): array
    {
        return [
            ['icon' => 'bi-exclamation-triangle', 'color' => 'text-warning', 'text' => 'Admin mencatat pelanggaran “Terlambat masuk madrasah” untuk Ahmad Zaky Mubarok (VII-A).', 'time' => '25 menit lalu'],
            ['icon' => 'bi-shield-check', 'color' => 'text-success', 'text' => 'Ustadzah Nur Laila (BK) memverifikasi pelanggaran santri kelas VIII-B.', 'time' => '1 jam lalu'],
            ['icon' => 'bi-journal-text', 'color' => 'text-futuhiyyah', 'text' => 'Ustadz Muhammad Fauzan mengisi jurnal Fiqih: Thaharah dan wudu.', 'time' => '2 jam lalu'],
            ['icon' => 'bi-award', 'color' => 'text-gold', 'text' => 'Prestasi “Juara 1 MTQ KKM” Ahmad Zaky menunggu verifikasi BK.', 'time' => '3 jam lalu'],
            ['icon' => 'bi-arrow-left-right', 'color' => 'text-info', 'text' => 'Santri mutasi masuk Muhammad Rizky ditempatkan di VII-C.', 'time' => 'Kemarin'],
        ];
    }

    public static function quickLinks(): array
    {
        return [
            ['icon' => 'bi-person-plus', 'label' => 'Tambah Siswa', 'url' => '/admin/siswa/create'],
            ['icon' => 'bi-exclamation-triangle', 'label' => 'Input Pelanggaran', 'url' => '/admin/pelanggaran/data'],
            ['icon' => 'bi-calendar-check', 'label' => 'Rekap Absensi', 'url' => '/admin/absensi'],
            ['icon' => 'bi-file-earmark-bar-graph', 'label' => 'Export Laporan', 'url' => '/admin/laporan'],
            ['icon' => 'bi-mortarboard', 'label' => 'Kelola Jadwal', 'url' => '/admin/akademik/jadwal'],
            ['icon' => 'bi-people-fill', 'label' => 'Verifikasi User', 'url' => '/admin/users'],
        ];
    }

    public static function todaySchedule(): array
    {
        return [
            ['jam' => '07.00–07.40', 'mapel' => "Al-Qur'an Hadits", 'kelas' => 'VII-A', 'guru' => 'Ustadzah Nur Laila, S.Ag'],
            ['jam' => '07.40–08.20', 'mapel' => 'Fiqih', 'kelas' => 'VII-A', 'guru' => 'Ustadz Muhammad Fauzan, S.Pd.I'],
            ['jam' => '08.20–09.00', 'mapel' => 'Bahasa Arab', 'kelas' => 'VIII-B', 'guru' => 'Ustadz Abdul Halim, M.Pd'],
            ['jam' => '09.20–10.00', 'mapel' => 'Matematika', 'kelas' => 'IX-C', 'guru' => 'Ustadzah Siti Maryam, S.Pd'],
            ['jam' => '10.00–10.40', 'mapel' => 'SKI', 'kelas' => 'VIII-B', 'guru' => 'Ustadz Hamzah, S.Pd.I'],
        ];
    }
}
