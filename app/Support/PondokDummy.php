<?php

namespace App\Support;

/** Dummy Fase 1 Pengurus Pondok. Tindak lanjut nyata di Task 2.11. */
class PondokDummy
{
    public static function ringkasan(): array
    {
        return [
            ['icon' => 'bi-house-heart-fill', 'value' => '186', 'label' => 'Santri mondok'],
            ['icon' => 'bi-exclamation-triangle-fill', 'value' => '2', 'label' => 'Perlu tindak lanjut asrama'],
            ['icon' => 'bi-moon-stars-fill', 'value' => '98%', 'label' => 'Kehadiran salat berjamaah'],
            ['icon' => 'bi-journal-check', 'value' => '24', 'label' => 'Jurnal asrama pekan ini'],
        ];
    }

    public static function pelanggaran(): array
    {
        return [
            ['tanggal' => '26 Sep 2025', 'santri' => 'Ahmad Zaky Mubarok (VII-A • Putra)', 'kategori' => 'Tanpa izin • 15 poin', 'status' => 'followup_pondok', 'label' => 'Tindak Lanjut Pondok', 'tindak' => 'Muhasabah malam + piket kebersihan 2 hari, dampingan Ustadz Ridwan.'],
            ['tanggal' => '20 Sep 2025', 'santri' => 'Muhammad Rizky Maulana (VII-C • Putra)', 'kategori' => 'Keluar pondok • 20 poin', 'status' => 'followup_bk', 'label' => 'Menunggu dari BK', 'tindak' => 'Menunggu hasil konseling BK sebelum pembinaan asrama.'],
            ['tanggal' => '15 Sep 2025', 'santri' => 'Abdullah Faqih Hidayat (VIII-A • Putra)', 'kategori' => 'Berkelahi • 40 poin', 'status' => 'followup_pondok', 'label' => 'Tindak Lanjut Pondok', 'tindak' => 'Mediasi selesai; tinggal wirid malam + surat pernyataan.'],
        ];
    }

    public static function monitoring(): array
    {
        return [
            ['aspek' => 'Salat Subuh berjamaah (Putra)', 'nilai' => '96%', 'ket' => '4 santri izin sakit, terpantau musyrif.'],
            ['aspek' => 'Setoran tahfidz pekan ini', 'nilai' => '88%', 'ket' => 'Target 1 halaman/pekan; 12 santri tertunda.'],
            ['aspek' => 'Absensi madrasah santri mondok', 'nilai' => '93%', 'ket' => 'Selaras dengan rekap admin; alpha 1 santri.'],
            ['aspek' => 'Jurnal kegiatan asrama', 'nilai' => '24 entri', 'ket' => 'Muhadharah, piket, dan tahajud bersama.'],
        ];
    }
}
