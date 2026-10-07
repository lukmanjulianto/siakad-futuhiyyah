<?php

namespace App\Support;

/** Dummy Fase 1 Pelanggaran (PRD Bab 6.I + 9). Alur nyata di Task 2.11. */
class PelanggaranDummy
{
    public static function kategori(): array
    {
        return [
            ['id' => 1, 'nama' => 'Terlambat masuk madrasah', 'level' => 'ringan', 'poin' => 5, 'sanksi' => 'Teguran lisan + mencatat di buku pelanggaran'],
            ['id' => 2, 'nama' => 'Tidak memakai atribut lengkap', 'level' => 'ringan', 'poin' => 5, 'sanksi' => 'Teguran + melengkapi atribut hari itu juga'],
            ['id' => 3, 'nama' => 'Tidak mengikuti pelajaran tanpa izin', 'level' => 'sedang', 'poin' => 15, 'sanksi' => 'Surat pemberitahuan orang tua + konseling BK'],
            ['id' => 4, 'nama' => 'Keluar pondok tanpa izin pengasuh', 'level' => 'sedang', 'poin' => 20, 'sanksi' => 'Pembinaan pengasuh + surat pernyataan santri'],
            ['id' => 5, 'nama' => 'Berkelahi dengan santri lain', 'level' => 'berat', 'poin' => 40, 'sanksi' => 'Skorsing 3 hari + mediasi BK bersama wali'],
            ['id' => 6, 'nama' => 'Mencuri', 'level' => 'berat', 'poin' => 50, 'sanksi' => 'Skorsing + sidang kepala madrasah bersama pengurus pondok'],
        ];
    }

    public static function statusOptions(): array
    {
        return [
            'pending' => 'Menunggu Verifikasi',
            'verified_bk' => 'Terverifikasi BK',
            'followup_bk' => 'Tindak Lanjut BK',
            'followup_pondok' => 'Tindak Lanjut Pondok',
            'completed' => 'Selesai',
        ];
    }

    public static function data(): array
    {
        return [
            ['id' => 1, 'tanggal' => '26 Sep 2025', 'santri' => 'Ahmad Zaky Mubarok', 'nis' => '240001', 'kelas' => 'VII-A', 'kategori' => 'Tidak mengikuti pelajaran tanpa izin', 'level' => 'sedang', 'poin' => 15, 'status' => 'pending', 'pelapor' => 'Ustadz Muhammad Fauzan', 'keterangan' => 'Tidak hadir jam Fiqih ke-2 tanpa surat izin; santri mengaku tertidur di asrama.'],
            ['id' => 2, 'tanggal' => '24 Sep 2025', 'santri' => 'Fatimah Nur Hidayah', 'nis' => '240002', 'kelas' => 'VIII-B', 'kategori' => 'Terlambat masuk madrasah', 'level' => 'ringan', 'poin' => 5, 'status' => 'verified_bk', 'pelapor' => 'Piket Gerbang', 'keterangan' => 'Datang 07.25 karena antre kamar mandi pondok; sudah ditegur.'],
            ['id' => 3, 'tanggal' => '20 Sep 2025', 'santri' => 'Muhammad Rizky Maulana', 'nis' => '240003', 'kelas' => 'VII-C', 'kategori' => 'Keluar pondok tanpa izin pengasuh', 'level' => 'sedang', 'poin' => 20, 'status' => 'followup_bk', 'pelapor' => 'Ustadz Pengasuh Putra', 'keterangan' => 'Keluar membeli alat tulis tanpa izin; BK menjadwalkan konseling Jumat.'],
            ['id' => 4, 'tanggal' => '15 Sep 2025', 'santri' => 'Abdullah Faqih Hidayat', 'nis' => '240005', 'kelas' => 'VIII-A', 'kategori' => 'Berkelahi dengan santri lain', 'level' => 'berat', 'poin' => 40, 'status' => 'followup_pondok', 'pelapor' => 'Ustadzah Nur Laila', 'keterangan' => 'Mediasi BK selesai; tinggal pembinaan malam di pondok putra.'],
            ['id' => 5, 'tanggal' => '12 Sep 2025', 'santri' => 'Ahmad Zaky Mubarok', 'nis' => '240001', 'kelas' => 'VII-A', 'kategori' => 'Terlambat masuk madrasah', 'level' => 'ringan', 'poin' => 5, 'status' => 'completed', 'pelapor' => 'Piket Gerbang', 'keterangan' => 'Sudah ditegur, surat pernyataan, dan shalat dhuha 4 rakaat.'],
            ['id' => 6, 'tanggal' => '8 Sep 2025', 'santri' => 'Khadijah Naila Zahra', 'nis' => '240006', 'kelas' => 'VII-B', 'kategori' => 'Tidak memakai atribut lengkap', 'level' => 'ringan', 'poin' => 5, 'status' => 'completed', 'pelapor' => 'Wali Kelas VII-B', 'keterangan' => 'Lupa membawa hasduk; dilengkapi siang harinya.'],
        ];
    }

    public static function alur(): array
    {
        return [
            ['key' => 'pending', 'label' => 'Input (Admin/Guru)', 'desc' => 'Pelanggaran dicatat + notifikasi ke BK & pondok.'],
            ['key' => 'verified_bk', 'label' => 'Verifikasi BK', 'desc' => 'Guru BK memeriksa kebenaran laporan.'],
            ['key' => 'followup_bk', 'label' => 'Tindak Lanjut BK', 'desc' => 'Sanksi + konseling bila perlu.'],
            ['key' => 'followup_pondok', 'label' => 'Tindak Lanjut Pondok', 'desc' => 'Pembinaan asrama bagi santri mondok.'],
            ['key' => 'completed', 'label' => 'Selesai', 'desc' => 'Seluruh tindak lanjut tuntas & tercatat.'],
        ];
    }
}
