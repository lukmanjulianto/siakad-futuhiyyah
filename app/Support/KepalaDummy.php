<?php

namespace App\Support;

/** Dummy Fase 1 Kepala Madrasah. Query nyata di Fase 2. */
class KepalaDummy
{
    public static function stats(): array
    {
        return [
            ['icon' => 'bi-people-fill', 'value' => '312', 'label' => 'Santri aktif'],
            ['icon' => 'bi-calendar-check', 'value' => '92%', 'label' => 'Kehadiran pekan ini'],
            ['icon' => 'bi-exclamation-triangle', 'value' => '6', 'label' => 'Pelanggaran bulan ini'],
            ['icon' => 'bi-award', 'value' => '12', 'label' => 'Prestasi semester ini'],
        ];
    }

    public static function pelanggaranPerLevel(): array
    {
        return ['labels' => ['Ringan', 'Sedang', 'Berat'], 'series' => [4, 2, 0]];
    }

    public static function monitoring(): array
    {
        return [
            ['guru' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'mapel' => 'Fiqih VII-A', 'jurnal' => 'Sudah (Thaharah dan wudu)', 'absensi' => 'Sudah 31/31', 'status' => 'Tuntas'],
            ['guru' => 'Ustadzah Nur Laila, S.Ag', 'mapel' => "Al-Qur'an Hadits VII-A", 'jurnal' => 'Sudah (Tajwid nun sukun)', 'absensi' => 'Sudah 30/31', 'status' => 'Tuntas'],
            ['guru' => 'Ustadzah Siti Maryam, S.Pd', 'mapel' => 'Matematika IX-C', 'jurnal' => 'Belum (tenggat H+1)', 'absensi' => 'Sudah 28/28', 'status' => 'Perlu perhatian'],
            ['guru' => 'Ustadz Hamzah, S.Pd.I', 'mapel' => 'SKI VIII-B', 'jurnal' => 'Sudah (Daulah Umayyah)', 'absensi' => 'Belum rekap', 'status' => 'Perlu perhatian'],
        ];
    }
}
