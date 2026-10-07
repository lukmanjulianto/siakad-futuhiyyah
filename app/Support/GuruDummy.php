<?php

namespace App\Support;

/** Dummy Fase 1 Guru Mapel. Input nyata per jadwal di Task 2.9/2.10. */
class GuruDummy
{
    public static function jadwalHariIni(): array
    {
        return [
            ['jam' => '07.00–08.20', 'mapel' => 'Fiqih', 'kelas' => 'VII-A', 'ruang' => 'R-01'],
            ['jam' => '09.20–10.00', 'mapel' => 'Fiqih', 'kelas' => 'VII-B', 'ruang' => 'R-02'],
            ['jam' => '10.00–10.40', 'mapel' => 'Nahwu', 'kelas' => 'VIII-A', 'ruang' => 'R-04'],
        ];
    }

    public static function daftarAbsensi(): array
    {
        return [
            ['nis' => '240001', 'nama' => 'Ahmad Zaky Mubarok', 'status' => 'hadir'],
            ['nis' => '240008', 'nama' => 'Maryam Salsabila', 'status' => 'hadir'],
            ['nis' => '240012', 'nama' => 'Bilal Syahdan', 'status' => 'sakit'],
            ['nis' => '240013', 'nama' => 'Nadia Ulfa', 'status' => 'izin'],
            ['nis' => '240014', 'nama' => 'Faris Aqila', 'status' => 'alpha'],
        ];
    }

    public static function riwayatJurnal(): array
    {
        return [
            ['tanggal' => '6 Okt 2025 • Fiqih VII-A', 'materi' => 'Thaharah: macam air dan tata cara wudu sesuai Fathul Qarib.', 'status' => 'Terkirim'],
            ['tanggal' => '3 Okt 2025 • Nahwu VIII-A', 'materi' => 'Irab kata benda: mubtada khabar dengan latihan 10 kalimat.', 'status' => 'Terkirim'],
        ];
    }
}
