<?php

namespace App\Support;

/** Dummy Fase 1 GTK. DB nyata di Task 2.7. */
class GtkDummy
{
    public static function list(): array
    {
        return [
            ['id' => 1, 'nik' => '3322123456780001', 'name' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'mapel' => 'Fiqih', 'ptk' => 'Guru', 'status' => 'aktif', 'phone' => '0812-1111-0001', 'email' => 'fauzan@mtsfutuhiyyah.sch.id'],
            ['id' => 2, 'nik' => '3322123456780002', 'name' => 'Ustadzah Nur Laila, S.Ag', 'mapel' => 'Bimbingan Konseling', 'ptk' => 'Guru', 'status' => 'aktif', 'phone' => '0812-1111-0002', 'email' => 'nurlaila@mtsfutuhiyyah.sch.id'],
            ['id' => 3, 'nik' => '3322123456780003', 'name' => 'Ustadz Abdul Halim, M.Pd', 'mapel' => 'Bahasa Arab / Kepala Madrasah', 'ptk' => 'Guru', 'status' => 'aktif', 'phone' => '0812-1111-0003', 'email' => 'abdulhalim@mtsfutuhiyyah.sch.id'],
            ['id' => 4, 'nik' => '3322123456780004', 'name' => 'Ustadzah Siti Maryam, S.Pd', 'mapel' => 'Matematika', 'ptk' => 'Guru', 'status' => 'aktif', 'phone' => '0812-1111-0004', 'email' => 'sitimaryam@mtsfutuhiyyah.sch.id'],
            ['id' => 5, 'nik' => '3322123456780005', 'name' => 'Ustadz Hamzah, S.Pd.I', 'mapel' => 'SKI', 'ptk' => 'Guru', 'status' => 'cuti', 'phone' => '0812-1111-0005', 'email' => 'hamzah@mtsfutuhiyyah.sch.id'],
            ['id' => 6, 'nik' => '3322123456780006', 'name' => 'Ahmad Hidayat, S.Kom', 'mapel' => 'Operator / Tendik', 'ptk' => 'Tendik', 'status' => 'aktif', 'phone' => '0812-1111-0006', 'email' => 'hidayat@mtsfutuhiyyah.sch.id'],
            ['id' => 7, 'nik' => '3322123456780007', 'name' => 'Ustadz Yusuf Maulana, S.Pd', 'mapel' => 'PJOK', 'ptk' => 'Guru', 'status' => 'mutasi_masuk', 'phone' => '0812-1111-0007', 'email' => 'yusuf@mtsfutuhiyyah.sch.id'],
            ['id' => 8, 'nik' => '3322123456780008', 'name' => 'H. Mahmud Yunus, S.Ag', 'mapel' => 'Akidah Akhlak (purnatugas)', 'ptk' => 'Guru', 'status' => 'nonaktif', 'phone' => '0812-1111-0008', 'email' => 'mahmud@mtsfutuhiyyah.sch.id'],
        ];
    }

    public static function statusOptions(): array
    {
        return ['aktif' => 'Aktif', 'mutasi_masuk' => 'Mutasi Masuk', 'nonaktif' => 'Nonaktif', 'cuti' => 'Cuti'];
    }

    public static function ptkOptions(): array
    {
        return ['Guru' => 'Guru', 'Tendik' => 'Tendik'];
    }

    public static function mapelOptions(): array
    {
        return ["Al-Qur'an Hadits", 'Fiqih', 'Akidah Akhlak', 'SKI', 'Bahasa Arab', 'Bahasa Indonesia', 'Bahasa Inggris', 'Matematika', 'IPA', 'IPS', 'PKn', 'Seni Budaya', 'PJOK', 'Prakarya', 'Nahwu', 'Shorof', 'Bimbingan Konseling'];
    }

    public static function educations(): array
    {
        return [
            ['level' => 'SD', 'school' => 'SDN 01 Wiradesa', 'year' => '2005', 'file' => 'ijazah-sd.pdf'],
            ['level' => 'SMP', 'school' => 'SMPN 1 Wiradesa', 'year' => '2008', 'file' => 'ijazah-smp.pdf'],
            ['level' => 'SMA', 'school' => 'MAN 1 Pekalongan', 'year' => '2011', 'file' => 'ijazah-sma.pdf'],
            ['level' => 'S1', 'school' => 'IAIN Pekalongan — Pendidikan Agama Islam', 'year' => '2015', 'file' => 'ijazah-s1.pdf'],
        ];
    }
}
