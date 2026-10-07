<?php

namespace App\Support;

/** Dummy Fase 1 Kelola Siswa (filter + wizard). DB nyata di Task 2.6. */
class StudentDummy
{
    public static function list(): array
    {
        return [
            ['id' => 1, 'nisn' => '0071234567', 'nis' => '240001', 'name' => 'Ahmad Zaky Mubarok', 'kelas' => 'VII-A', 'pondok' => 'Futuhiyyah Putra', 'status' => 'aktif', 'ibu' => 'Siti Aminah', 'hp' => '0812-3456-7890'],
            ['id' => 2, 'nisn' => '0071234568', 'nis' => '240002', 'name' => 'Fatimah Nur Hidayah', 'kelas' => 'VIII-B', 'pondok' => 'Futuhiyyah Putri', 'status' => 'aktif', 'ibu' => 'Umi Kalsum', 'hp' => '0813-9876-5432'],
            ['id' => 3, 'nisn' => '0071234569', 'nis' => '240003', 'name' => 'Muhammad Rizky Maulana', 'kelas' => 'VII-C', 'pondok' => 'Futuhiyyah Putra', 'status' => 'aktif_mutasi_masuk', 'ibu' => 'Dewi Lestari', 'hp' => '0821-2233-4455'],
            ['id' => 4, 'nisn' => '0071234570', 'nis' => '240004', 'name' => 'Aisyah Putri Ramadhani', 'kelas' => 'IX-A', 'pondok' => 'Futuhiyyah Putri', 'status' => 'aktif', 'ibu' => 'Nurul Hidayah', 'hp' => '0857-1111-2222'],
            ['id' => 5, 'nisn' => '0071234571', 'nis' => '240005', 'name' => 'Abdullah Faqih Hidayat', 'kelas' => 'VIII-A', 'pondok' => 'Futuhiyyah Putra', 'status' => 'mutasi_keluar', 'ibu' => 'Maryam', 'hp' => '0819-5555-6666'],
            ['id' => 6, 'nisn' => '0071234572', 'nis' => '240006', 'name' => 'Khadijah Naila Zahra', 'kelas' => 'VII-B', 'pondok' => 'Futuhiyyah Putri', 'status' => 'aktif', 'ibu' => 'Fatimah Az-Zahra', 'hp' => '0822-7777-8888'],
            ['id' => 7, 'nisn' => '0071234573', 'nis' => '240007', 'name' => 'Umar Faruq Al-Faruq', 'kelas' => 'IX-B', 'pondok' => '-', 'status' => 'nonaktif', 'ibu' => 'Zainab', 'hp' => '0813-0000-1111'],
            ['id' => 8, 'nisn' => '0071234574', 'nis' => '240008', 'name' => 'Maryam Salsabila', 'kelas' => 'VII-A', 'pondok' => 'Futuhiyyah Putri', 'status' => 'lulus', 'ibu' => 'Hafsah', 'hp' => '0856-9999-0000'],
        ];
    }

    public static function kelasOptions(): array
    {
        return ['VII-A', 'VII-B', 'VII-C', 'VIII-A', 'VIII-B', 'VIII-C', 'IX-A', 'IX-B', 'IX-C'];
    }

    public static function statusOptions(): array
    {
        return ['aktif' => 'Aktif', 'aktif_mutasi_masuk' => 'Aktif (Mutasi Masuk)', 'mutasi_keluar' => 'Mutasi Keluar', 'lulus' => 'Lulus', 'nonaktif' => 'Nonaktif'];
    }

    public static function wilayah(): array
    {
        return [
            'provinces' => ['Jawa Tengah', 'Jawa Barat', 'Jawa Timur', 'DI Yogyakarta'],
            'regencies' => ['Pekalongan', 'Batang', 'Pemalang', 'Semarang'],
            'districts' => ['Wiradesa', 'Kedungwuni', 'Kajen', 'Bojong'],
            'villages' => ['Kauman', 'Mayangan', 'Pekuncen', 'Simo'],
        ];
    }

    public static function beasiswa(): array
    {
        return [
            ['tahun' => '2025', 'kategori' => 'Beasiswa Berprestasi', 'nama' => 'Beasiswa Tahfidz Yayasan', 'lembaga' => 'Yayasan Futuhiyyah', 'durasi' => '12 bulan', 'nominal' => 'Rp3.600.000'],
        ];
    }

    public static function prestasi(): array
    {
        return [
            ['tanggal' => '15 Mar 2025', 'nama' => 'Juara 1 Lomba MTQ Tingkat KKM', 'tingkat' => 'KKM', 'penyelenggara' => 'KKM MTs Pekalongan Barat'],
            ['tanggal' => '10 Mei 2025', 'nama' => 'Juara Harapan 1 Olimpiade Matematika Madrasah', 'tingkat' => 'Madrasah', 'penyelenggara' => 'MTs Futuhiyyah'],
        ];
    }
}
