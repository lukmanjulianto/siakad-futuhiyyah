<?php

namespace App\Support;

/**
 * Data dummy realistis Fase 1 untuk area publik (PRD Bab 9).
 * Akan diganti query Eloquent di Task 2.5.
 */
class PublicDummy
{
    public static function students(): array
    {
        return [
            'ahmad' => [
                'key' => 'ahmad',
                'name' => 'Ahmad Zaky Mubarok',
                'nisn' => '0071234567',
                'nis_lokal' => '240001',
                'kelas' => 'VII-A',
                'wali_kelas' => 'Ustadz Muhammad Fauzan, S.Pd.I',
                'email' => 'ahmadzaky@student.mtsfutuhiyyah.sch.id',
                'phone' => '0812-3456-7890',
                'pondok' => 'Pondok Futuhiyyah Putra',
                'birth_date' => '2012-05-14',
                'birth_date_indo' => '14 Mei 2012',
                'mother' => 'Siti Aminah',
                'father' => 'H. Muhammad Ridwan',
                'status' => 'Aktif',
                'initials' => 'AZ',
            ],
            'fatimah' => [
                'key' => 'fatimah',
                'name' => 'Fatimah Nur Hidayah',
                'nisn' => '0071234568',
                'nis_lokal' => '240002',
                'kelas' => 'VIII-B',
                'wali_kelas' => 'Ustadzah Nur Laila, S.Ag',
                'email' => 'fatimahnh@student.mtsfutuhiyyah.sch.id',
                'phone' => '0813-9876-5432',
                'pondok' => 'Pondok Futuhiyyah Putri',
                'birth_date' => '2011-08-22',
                'birth_date_indo' => '22 Agustus 2011',
                'mother' => 'Umi Kalsum',
                'father' => 'H. Abdul Karim',
                'status' => 'Aktif',
                'initials' => 'FN',
            ],
        ];
    }

    public static function homeStats(): array
    {
        return [
            ['icon' => 'bi-people-fill', 'value' => '312', 'label' => 'Santri aktif'],
            ['icon' => 'bi-person-badge-fill', 'value' => '28', 'label' => 'Guru & tendik'],
            ['icon' => 'bi-door-open-fill', 'value' => '9', 'label' => 'Kelas VII–IX'],
            ['icon' => 'bi-book-half', 'value' => '16', 'label' => 'Mata pelajaran'],
        ];
    }

    public static function absences(string $key = 'ahmad'): array
    {
        $data = [
            'ahmad' => [
                ['hari' => 'Senin', 'tanggal' => '29 Sep 2025', 'mapel' => 'Fiqih', 'guru' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'alasan' => 'Sakit (surat orang tua)'],
                ['hari' => 'Sabtu', 'tanggal' => '4 Okt 2025', 'mapel' => 'Matematika', 'guru' => 'Ustadzah Siti Maryam, S.Pd', 'alasan' => 'Izin acara keluarga'],
            ],
            'fatimah' => [
                ['hari' => 'Rabu', 'tanggal' => '1 Okt 2025', 'mapel' => 'Bahasa Arab', 'guru' => 'Ustadz Abdul Halim, M.Pd', 'alasan' => 'Sakit (keterangan pondok)'],
            ],
        ];

        return $data[$key] ?? $data['ahmad'];
    }

    public static function violations(string $key = 'ahmad'): array
    {
        $data = [
            'ahmad' => [
                ['tanggal' => '12 Sep 2025', 'jenis' => 'Terlambat masuk madrasah', 'level' => 'Ringan', 'poin' => 5, 'status' => 'Selesai', 'badge' => 'success'],
                ['tanggal' => '26 Sep 2025', 'jenis' => 'Tidak mengikuti pelajaran tanpa izin', 'level' => 'Sedang', 'poin' => 15, 'status' => 'Tindak lanjut BK', 'badge' => 'warning'],
            ],
            'fatimah' => [
                ['tanggal' => '8 Sep 2025', 'jenis' => 'Terlambat masuk madrasah', 'level' => 'Ringan', 'poin' => 5, 'status' => 'Selesai', 'badge' => 'success'],
            ],
        ];

        return $data[$key] ?? $data['ahmad'];
    }

    public static function violationPie(string $key = 'ahmad'): array
    {
        return $key === 'fatimah' ? [1, 0, 0] : [1, 1, 0]; // ringan, sedang, berat
    }

    public static function journals(string $key = 'ahmad'): array
    {
        return [
            ['hari' => 'Senin, 29 Sep 2025', 'mapel' => 'Fiqih', 'guru' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'materi' => 'Thaharah: macam air dan tata cara wudu sesuai kitab Fathul Qarib.'],
            ['hari' => 'Selasa, 30 Sep 2025', 'mapel' => "Al-Qur'an Hadits", 'guru' => 'Ustadzah Nur Laila, S.Ag', 'materi' => 'Tajwid nun sukun: izhar, idgham, iqlab beserta praktik surah Al-Fatihah.'],
            ['hari' => 'Rabu, 1 Okt 2025', 'mapel' => 'Bahasa Arab', 'guru' => 'Ustadz Abdul Halim, M.Pd', 'materi' => 'Mufrodat tentang madrasah dan percakapan perkenalan (taaruf).'],
            ['hari' => 'Kamis, 2 Okt 2025', 'mapel' => 'Matematika', 'guru' => 'Ustadzah Siti Maryam, S.Pd', 'materi' => 'Aljabar: penjumlahan dan pengurangan bentuk aljabar dengan latihan kelompok.'],
            ['hari' => 'Sabtu, 4 Okt 2025', 'mapel' => 'SKI', 'guru' => 'Ustadz Hamzah, S.Pd.I', 'materi' => 'Peradaban Daulah Umayyah: silsilah khalifah dan peninggalan ilmu.'],
        ];
    }

    public static function achievements(string $key = 'ahmad'): array
    {
        $data = [
            'ahmad' => [
                ['tanggal' => '15 Mar 2025', 'nama' => 'Juara 1 Lomba MTQ Tingkat KKM', 'tingkat' => 'KKM', 'penyelenggara' => 'KKM MTs Pekalongan Barat'],
                ['tanggal' => '10 Mei 2025', 'nama' => 'Juara Harapan 1 Olimpiade Matematika Madrasah', 'tingkat' => 'Madrasah', 'penyelenggara' => 'MTs Futuhiyyah'],
            ],
            'fatimah' => [
                ['tanggal' => '20 Apr 2025', 'nama' => 'Juara 2 Lomba Pidato Bahasa Arab Tingkat Kabupaten', 'tingkat' => 'Wilayah', 'penyelenggara' => 'Kemenag Kab. Pekalongan'],
            ],
        ];

        return $data[$key] ?? $data['ahmad'];
    }
}
