<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// 30 santri realistis (2 contoh PRD Bab 9 + 28 tambahan). Idempotent via NISN.
class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $taId = DB::table('academic_years')->where('is_active', true)->value('id');
        $kelas = DB::table('classrooms')->orderBy('id')->pluck('id', 'name');
        $putraId = DB::table('pondoks')->where('name', 'Pondok Futuhiyyah Putra')->value('id');
        $putriId = DB::table('pondoks')->where('name', 'Pondok Futuhiyyah Putri')->value('id');
        $provId = DB::table('provinces')->where('name', 'Jawa Tengah')->value('id');

        $names = [
            // [nama, gender, kelas, pondok(L/P/-), status, ibu, tgl_lahir]
            ['Ahmad Zaky Mubarok', 'L', 'VII-A', 'L', 'aktif', 'Siti Aminah', '2012-05-14'],
            ['Fatimah Nur Hidayah', 'P', 'VIII-B', 'P', 'aktif', 'Umi Kalsum', '2011-08-22'],
            ['Muhammad Rizky Maulana', 'L', 'VII-C', 'L', 'aktif_mutasi_masuk', 'Dewi Lestari', '2012-07-03'],
            ['Aisyah Putri Ramadhani', 'P', 'IX-A', 'P', 'aktif', 'Nurul Hidayah', '2010-11-19'],
            ['Abdullah Faqih Hidayat', 'L', 'VIII-A', 'L', 'mutasi_keluar', 'Maryam', '2011-02-27'],
            ['Khadijah Naila Zahra', 'P', 'VII-B', 'P', 'aktif', 'Fatimah Az-Zahra', '2012-09-30'],
            ['Umar Faruq Al-Faruq', 'L', 'IX-B', 'L', 'nonaktif', 'Zainab', '2010-04-11'],
            ['Maryam Salsabila', 'P', 'VII-A', 'P', 'aktif', 'Hafsah', '2012-12-01'],
            ['Bilal Syahdan', 'L', 'VII-A', '-', 'aktif', 'Rukayah', '2012-03-17'],
            ['Nadia Ulfa', 'P', 'VII-B', 'P', 'aktif', 'Istiqlaliyah', '2012-06-25'],
            ['Faris Aqila', 'L', 'VII-C', '-', 'aktif', 'Halimah', '2012-01-08'],
            ['Salma Nabila Putri', 'P', 'IX-A', 'P', 'aktif', 'Maimunah', '2010-10-02'],
            ['Yusuf Abdullah Pratama', 'L', 'VII-B', 'L', 'aktif_mutasi_masuk', 'Saadah', '2012-08-14'],
            ['Hana Syakira', 'P', 'VIII-A', 'P', 'aktif', 'Latifah', '2011-05-09'],
            ['Ridho Ramadhan', 'L', 'VIII-C', 'L', 'aktif', 'Jamilah', '2011-09-21'],
            ['Putri Anjani', 'P', 'VIII-C', '-', 'aktif', 'Sarofah', '2011-12-30'],
            ['Dimas Prasetyo', 'L', 'IX-C', '-', 'aktif', 'Wartini', '2010-07-07'],
            ['Intan Permata', 'P', 'IX-C', 'P', 'lulus', 'Sulastri', '2010-02-14'],
            ['Galih Prakoso', 'L', 'VII-A', 'L', 'aktif', 'Sumarni', '2012-04-19'],
            ['Laila Rahma', 'P', 'VII-C', 'P', 'aktif', 'Rohmah', '2012-10-11'],
            ['Fikri Haikal', 'L', 'VIII-B', 'L', 'aktif', 'Munawaroh', '2011-06-05'],
            ['Zahra Maulida', 'P', 'VIII-B', '-', 'aktif', 'Qomariyah', '2011-03-28'],
            ['Ilham Saputra', 'L', 'IX-A', 'L', 'aktif', 'Dariyah', '2010-08-16'],
            ['Nabila Khansa', 'P', 'IX-B', 'P', 'aktif', 'Maemunah', '2010-12-24'],
            ['Rizal Maulana', 'L', 'IX-B', '-', 'mutasi_keluar', 'Khodijah', '2010-05-05'],
            ['Salsa Aulia', 'P', 'VII-A', 'P', 'aktif', 'Yamah', '2012-02-20'],
            ['Bagus Setiawan', 'L', 'VIII-A', 'L', 'aktif', 'Tuti Herawati', '2011-01-15'],
            ['Dina Marlina', 'P', 'IX-A', '-', 'aktif', 'Yuyun Yuningsih', '2010-09-09'],
            ['Aji Pangestu', 'L', 'VII-B', 'L', 'aktif', 'Srimpi', '2012-11-02'],
            ['Wulan Puspita', 'P', 'VIII-C', 'P', 'aktif', 'Endang Lestari', '2011-07-12'],
        ];

        foreach ($names as $i => [$nama, $gender, $kelas, $pondok, $status, $ibu, $lahir]) {
            $nisn = '0071234' . str_pad(567 + $i, 3, '0', STR_PAD_LEFT);
            $nis = str_pad(240001 + $i, 6, '0', STR_PAD_LEFT);
            $kata = explode(' ', $nama);
            $email = strtolower($kata[0] . ($kata[1] ?? '') . '@student.mtsfutuhiyyah.sch.id');

            DB::table('students')->updateOrInsert(
                ['nisn' => $nisn],
                [
                    'nis_lokal' => $nis,
                    'name' => $nama,
                    'birth_place' => 'Pekalongan',
                    'birth_date' => $lahir,
                    'gender' => $gender,
                    'religion' => 'Islam',
                    'pondok_id' => $pondok === 'L' ? $putraId : ($pondok === 'P' ? $putriId : null),
                    'student_phone' => '0812-' . str_pad(3400000 + $i * 137, 7, '0', STR_PAD_LEFT),
                    'student_email' => $email,
                    'mother_name' => $ibu,
                    'mother_status' => 'masih hidup',
                    'father_name' => 'H. Ayahanda ' . $kata[0],
                    'parent_province_id' => $provId,
                    'classroom_id' => $kelas[$kelas] ?? null,
                    'academic_year_id' => $taId,
                    'enrollment_date' => '2025-07-14',
                    'entry_type' => $status === 'aktif_mutasi_masuk' ? 'mutasi_masuk' : 'siswa_baru',
                    'status' => $status,
                    'status_note' => $status === 'mutasi_keluar' ? 'Pindah mengikuti orang tua' : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
