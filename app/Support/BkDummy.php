<?php

namespace App\Support;

/** Dummy Fase 1 Guru BK. CRUD + verifikasi nyata di Task 2.11/2.12. */
class BkDummy
{
    public static function ringkasan(): array
    {
        return [
            ['icon' => 'bi-inbox-fill', 'value' => '3', 'label' => 'Menunggu verifikasi'],
            ['icon' => 'bi-chat-heart-fill', 'value' => '4', 'label' => 'Siswa perlu konseling'],
            ['icon' => 'bi-arrow-repeat', 'value' => '2', 'label' => 'Tindak lanjut berjalan'],
            ['icon' => 'bi-award-fill', 'value' => '2', 'label' => 'Prestasi perlu verifikasi'],
        ];
    }

    public static function antrean(): array
    {
        return [
            ['tanggal' => '26 Sep 2025', 'santri' => 'Ahmad Zaky Mubarok (VII-A)', 'kategori' => 'Tanpa izin • 15 poin', 'status' => 'pending', 'label' => 'Menunggu Verifikasi'],
            ['tanggal' => '24 Sep 2025', 'santri' => 'Fatimah Nur Hidayah (VIII-B)', 'kategori' => 'Terlambat • 5 poin', 'status' => 'verified_bk', 'label' => 'Terverifikasi'],
            ['tanggal' => '20 Sep 2025', 'santri' => 'Muhammad Rizky Maulana (VII-C)', 'kategori' => 'Keluar pondok • 20 poin', 'status' => 'followup_bk', 'label' => 'Tindak Lanjut BK'],
        ];
    }

    public static function konseling(): array
    {
        return [
            ['tanggal' => '27 Sep 2025', 'santri' => 'Ahmad Zaky Mubarok (VII-A)', 'topik' => 'Disiplin waktu dan tanggung jawab asrama', 'hasil' => 'Santri membuat jadwal harian + kontrol wali asrama 1 pekan.', 'status' => 'monitoring'],
            ['tanggal' => '22 Sep 2025', 'santri' => 'Muhammad Rizky Maulana (VII-C)', 'topik' => 'Adaptasi santri mutasi masuk', 'hasil' => 'Dikenalkan kakak pendamping; betah dan aktif tahfidz.', 'status' => 'closed'],
            ['tanggal' => '18 Sep 2025', 'santri' => 'Abdullah Faqih Hidayat (VIII-A)', 'topik' => 'Konflik dengan teman sekamar', 'hasil' => 'Mediasi selesai; kesepakatan tertulis kedua pihak.', 'status' => 'open'],
        ];
    }

    public static function tindakLanjut(): array
    {
        return [
            ['santri' => 'Muhammad Rizky Maulana (VII-C)', 'sanksi' => 'Teguran + surat pernyataan + pendampingan wali asrama', 'progres' => 60, 'status' => 'followup_bk'],
            ['santri' => 'Abdullah Faqih Hidayat (VIII-A)', 'sanksi' => 'Mediasi + denda sosial membersihkan musala 3 hari', 'progres' => 85, 'status' => 'followup_pondok'],
        ];
    }

    public static function prestasi(): array
    {
        return [
            ['tanggal' => '15 Mar 2025', 'nama' => 'Juara 1 Lomba MTQ Tingkat KKM', 'santri' => 'Ahmad Zaky Mubarok', 'tingkat' => 'KKM', 'status' => 'pending'],
            ['tanggal' => '20 Apr 2025', 'nama' => 'Juara 2 Pidato Bahasa Arab Kab.', 'santri' => 'Fatimah Nur Hidayah', 'tingkat' => 'Wilayah', 'status' => 'verified'],
        ];
    }
}
