<?php

namespace App\Support;

/** Dummy Fase 1 Absensi & Laporan. Query + export nyata di Task 2.9/2.13. */
class OperasionalDummy
{
    public static function rekap(): array
    {
        return [
            ['kelas' => 'VII-A', 'tanggal' => '6 Okt 2025', 'hadir' => 29, 'sakit' => 1, 'izin' => 1, 'alpha' => 0, 'persen' => 94],
            ['kelas' => 'VII-B', 'tanggal' => '6 Okt 2025', 'hadir' => 27, 'sakit' => 2, 'izin' => 1, 'alpha' => 0, 'persen' => 90],
            ['kelas' => 'VII-C', 'tanggal' => '6 Okt 2025', 'hadir' => 26, 'sakit' => 1, 'izin' => 1, 'alpha' => 1, 'persen' => 90],
            ['kelas' => 'VIII-A', 'tanggal' => '6 Okt 2025', 'hadir' => 30, 'sakit' => 1, 'izin' => 1, 'alpha' => 0, 'persen' => 94],
            ['kelas' => 'VIII-B', 'tanggal' => '6 Okt 2025', 'hadir' => 28, 'sakit' => 2, 'izin' => 0, 'alpha' => 1, 'persen' => 90],
            ['kelas' => 'IX-A', 'tanggal' => '6 Okt 2025', 'hadir' => 27, 'sakit' => 1, 'izin' => 2, 'alpha' => 0, 'persen' => 90],
        ];
    }

    public static function jenisLaporan(): array
    {
        return [
            'siswa' => 'Data Santri',
            'gtk' => 'Data Guru & Tendik',
            'absensi' => 'Rekap Absensi',
            'pelanggaran' => 'Data Pelanggaran',
            'prestasi' => 'Data Prestasi',
            'jurnal' => 'Jurnal Mengajar',
        ];
    }

    public static function preview(string $jenis = 'absensi'): array
    {
        $rows = [
            'siswa' => [['Ahmad Zaky Mubarok', '0071234567', 'VII-A', 'Aktif'], ['Fatimah Nur Hidayah', '0071234568', 'VIII-B', 'Aktif'], ['Muhammad Rizky Maulana', '0071234569', 'VII-C', 'Mutasi Masuk']],
            'gtk' => [['Ustadz Muhammad Fauzan, S.Pd.I', 'Fiqih', 'Aktif'], ['Ustadzah Nur Laila, S.Ag', 'BK', 'Aktif'], ['Ahmad Hidayat, S.Kom', 'Tendik', 'Aktif']],
            'absensi' => [['VII-A • 6 Okt 2025', '29 hadir', '94%'], ['VIII-B • 6 Okt 2025', '28 hadir', '90%'], ['IX-A • 6 Okt 2025', '27 hadir', '90%']],
            'pelanggaran' => [['26 Sep 2025 • Ahmad Zaky', 'Tanpa izin • 15 poin', 'Menunggu'], ['12 Sep 2025 • Ahmad Zaky', 'Terlambat • 5 poin', 'Selesai']],
            'prestasi' => [['Juara 1 MTQ KKM', 'Ahmad Zaky • KKM'], ['Juara 2 Pidato B. Arab', 'Fatimah • Wilayah']],
            'jurnal' => [['29 Sep • Fiqih VII-A', 'Thaharah dan wudu'], ['30 Sep • Tahfidz VII-A', 'Tajwid nun sukun']],
        ];

        return $rows[$jenis] ?? $rows['absensi'];
    }
}
