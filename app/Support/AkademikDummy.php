<?php

namespace App\Support;

/** Dummy Fase 1 Akademik. DB nyata di Task 2.8. */
class AkademikDummy
{
    public static function kelas(): array
    {
        return [
            ['nama' => 'VII-A', 'tingkat' => 'VII', 'wali' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'kapasitas' => 32, 'terisi' => 31],
            ['nama' => 'VII-B', 'tingkat' => 'VII', 'wali' => 'Ustadzah Siti Maryam, S.Pd', 'kapasitas' => 32, 'terisi' => 30],
            ['nama' => 'VII-C', 'tingkat' => 'VII', 'wali' => 'Ustadz Hamzah, S.Pd.I', 'kapasitas' => 32, 'terisi' => 29],
            ['nama' => 'VIII-A', 'tingkat' => 'VIII', 'wali' => 'Ustadz Abdul Halim, M.Pd', 'kapasitas' => 32, 'terisi' => 32],
            ['nama' => 'VIII-B', 'tingkat' => 'VIII', 'wali' => 'Ustadzah Nur Laila, S.Ag', 'kapasitas' => 32, 'terisi' => 31],
            ['nama' => 'VIII-C', 'tingkat' => 'VIII', 'wali' => 'Ustadz Yusuf Maulana, S.Pd', 'kapasitas' => 32, 'terisi' => 28],
            ['nama' => 'IX-A', 'tingkat' => 'IX', 'wali' => 'Ustadzah Khadijah, S.Pd', 'kapasitas' => 32, 'terisi' => 30],
            ['nama' => 'IX-B', 'tingkat' => 'IX', 'wali' => 'Ustadz Karim, S.Pd.I', 'kapasitas' => 32, 'terisi' => 29],
            ['nama' => 'IX-C', 'tingkat' => 'IX', 'wali' => 'Ustadzah Maryam Salsabila, S.Pd', 'kapasitas' => 32, 'terisi' => 28],
        ];
    }

    public static function mapel(): array
    {
        return [
            ['kode' => 'QHD', 'nama' => "Al-Qur'an Hadits", 'kelompok' => 'agama'],
            ['kode' => 'FQH', 'nama' => 'Fiqih', 'kelompok' => 'agama'],
            ['kode' => 'AQH', 'nama' => 'Akidah Akhlak', 'kelompok' => 'agama'],
            ['kode' => 'SKI', 'nama' => 'SKI', 'kelompok' => 'agama'],
            ['kode' => 'ARB', 'nama' => 'Bahasa Arab', 'kelompok' => 'agama'],
            ['kode' => 'BIN', 'nama' => 'Bahasa Indonesia', 'kelompok' => 'umum'],
            ['kode' => 'BIG', 'nama' => 'Bahasa Inggris', 'kelompok' => 'umum'],
            ['kode' => 'MTK', 'nama' => 'Matematika', 'kelompok' => 'umum'],
            ['kode' => 'IPA', 'nama' => 'IPA', 'kelompok' => 'umum'],
            ['kode' => 'IPS', 'nama' => 'IPS', 'kelompok' => 'umum'],
            ['kode' => 'PKN', 'nama' => 'PKn', 'kelompok' => 'umum'],
            ['kode' => 'SNB', 'nama' => 'Seni Budaya', 'kelompok' => 'umum'],
            ['kode' => 'PJK', 'nama' => 'PJOK', 'kelompok' => 'umum'],
            ['kode' => 'PRK', 'nama' => 'Prakarya', 'kelompok' => 'umum'],
            ['kode' => 'NHW', 'nama' => 'Nahwu', 'kelompok' => 'muatan_lokal'],
            ['kode' => 'SHR', 'nama' => 'Shorof', 'kelompok' => 'muatan_lokal'],
        ];
    }

    public static function templates(): array
    {
        return [
            ['id' => 'ganjil-2526', 'nama' => 'Template Ganjil 2025/2026', 'ta' => '2025/2026 Ganjil', 'aktif' => true, 'jumlah' => 148],
            ['id' => 'genap-2425', 'nama' => 'Template Genap 2024/2025', 'ta' => '2024/2025 Genap', 'aktif' => false, 'jumlah' => 142],
            ['id' => 'draf-2526', 'nama' => 'Draf Ganjil 2025/2026 (cadangan)', 'ta' => '2025/2026 Ganjil', 'aktif' => false, 'jumlah' => 12],
        ];
    }

    public static function days(): array
    {
        return ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Sabtu', 'Minggu'];
    }

    /** Grid contoh kelas VII-A, jam ke 1–6. */
    public static function grid(): array
    {
        $cell = fn ($mapel, $guru) => ['mapel' => $mapel, 'guru' => $guru];
        return [
            'Senin' => [1 => $cell('Fiqih', 'M. Fauzan'), 2 => $cell('Fiqih', 'M. Fauzan'), 3 => $cell('Matematika', 'S. Maryam'), 4 => $cell('Matematika', 'S. Maryam'), 5 => $cell('SKI', 'Hamzah'), 6 => $cell('SKI', 'Hamzah')],
            'Selasa' => [1 => $cell("Al-Qur'an Hadits", 'N. Laila'), 2 => $cell("Al-Qur'an Hadits", 'N. Laila'), 3 => $cell('Bahasa Arab', 'A. Halim'), 4 => $cell('Bahasa Arab', 'A. Halim'), 5 => $cell('IPA', 'S. Maryam'), 6 => $cell('IPA', 'S. Maryam')],
            'Rabu' => [1 => $cell('Akidah Akhlak', 'Karim'), 2 => $cell('Akidah Akhlak', 'Karim'), 3 => $cell('B. Indonesia', 'Khadijah'), 4 => $cell('B. Indonesia', 'Khadijah'), 5 => $cell('Nahwu', 'M. Fauzan'), 6 => $cell('Nahwu', 'M. Fauzan')],
            'Kamis' => [1 => $cell('Matematika', 'S. Maryam'), 2 => $cell('Matematika', 'S. Maryam'), 3 => $cell('B. Inggris', 'Yusuf'), 4 => $cell('B. Inggris', 'Yusuf'), 5 => $cell('Shorof', 'M. Fauzan'), 6 => $cell('Shorof', 'M. Fauzan')],
            'Sabtu' => [1 => $cell('PKn', 'Khadijah'), 2 => $cell('PKn', 'Khadijah'), 3 => $cell('PJOK', 'Yusuf'), 4 => $cell('PJOK', 'Yusuf'), 5 => $cell('Prakarya', 'Hidayat'), 6 => $cell('Prakarya', 'Hidayat')],
            'Minggu' => [1 => $cell('Seni Budaya', 'N. Laila'), 2 => $cell('Seni Budaya', 'N. Laila'), 3 => $cell('IPS', 'Hamzah'), 4 => $cell('IPS', 'Hamzah'), 5 => null, 6 => null],
        ];
    }

    public static function naikKelasSiswa(): array
    {
        return [
            ['nis' => '240001', 'nama' => 'Ahmad Zaky Mubarok', 'asal' => 'VII-A', 'tujuan' => 'VIII-A', 'naik' => true],
            ['nis' => '240006', 'nama' => 'Khadijah Naila Zahra', 'asal' => 'VII-B', 'tujuan' => 'VIII-B', 'naik' => true],
            ['nis' => '240008', 'nama' => 'Maryam Salsabila', 'asal' => 'VII-A', 'tujuan' => 'VII-A', 'naik' => false],
            ['nis' => '240003', 'nama' => 'Muhammad Rizky Maulana', 'asal' => 'VII-C', 'tujuan' => 'VIII-C', 'naik' => true],
            ['nis' => '240002', 'nama' => 'Fatimah Nur Hidayah', 'asal' => 'VIII-B', 'tujuan' => 'IX-B', 'naik' => true],
        ];
    }
}
