<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// 15 GTK realistis (3 contoh PRD Bab 9 + 12 tambahan). Idempotent via NIK.
class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $provId = DB::table('provinces')->where('name', 'Jawa Tengah')->value('id');

        $rows = [
            // [nama, gender, mapel, ptk, status, lahir]
            ['Ustadz Muhammad Fauzan, S.Pd.I', 'L', 'Fiqih', 'Guru', 'aktif', '1988-04-12'],
            ['Ustadzah Nur Laila, S.Ag', 'P', 'BK', 'Guru', 'aktif', '1990-06-20'],
            ['Ustadz Abdul Halim, M.Pd', 'L', 'Bahasa Arab', 'Guru', 'aktif', '1982-01-15'],
            ['Ustadzah Siti Maryam, S.Pd', 'P', 'Matematika', 'Guru', 'aktif', '1991-09-02'],
            ['Ustadz Hamzah, S.Pd.I', 'L', 'SKI', 'Guru', 'cuti', '1989-12-10'],
            ['Ahmad Hidayat, S.Kom', 'L', 'Operator', 'Tendik', 'aktif', '1993-03-25'],
            ['Ustadz Yusuf Maulana, S.Pd', 'L', 'PJOK', 'Guru', 'mutasi_masuk', '1994-07-30'],
            ['H. Mahmud Yunus, S.Ag', 'L', 'Akidah Akhlak', 'Guru', 'nonaktif', '1975-11-11'],
            ['Ustadzah Khadijah, S.Pd', 'P', 'Bahasa Indonesia', 'Guru', 'aktif', '1992-02-08'],
            ['Ustadz Karim, S.Pd.I', 'L', 'Akidah Akhlak', 'Guru', 'aktif', '1987-08-08'],
            ['Ustadzah Fatimah Zahra, S.Pd', 'P', 'IPA', 'Guru', 'aktif', '1990-10-17'],
            ['Wildan Hakim, S.T', 'L', 'Tata Usaha', 'Tendik', 'aktif', '1995-05-21'],
            ['Ustadzah Maryam Salsabila, S.Pd', 'P', "Al-Qur'an Hadits", 'Guru', 'aktif', '1993-12-05'],
            ['Ustadz Ridwan Hakim, S.Ag', 'L', 'Pengasuhan Putra', 'Guru', 'aktif', '1985-09-09'],
            ['Ustadzah Nadia Ulfa, S.Pd', 'P', 'Bahasa Inggris', 'Guru', 'aktif', '1994-04-04'],
        ];

        $mapelId = DB::table('subjects')->pluck('id', 'name');

        foreach ($rows as $i => [$nama, $gender, $mapel, $ptk, $status, $lahir]) {
            $nik = '332212345678' . str_pad(1 + $i, 4, '0', STR_PAD_LEFT);
            $slug = strtolower(preg_replace('/[^a-z]/i', '', explode(' ', $nama)[1] ?? 'gtk') . $i);

            $teacherId = DB::table('teachers')->where('nik', $nik)->value('id');
            if (! $teacherId) {
                $teacherId = DB::table('teachers')->insertGetId([
                    'name' => $nama,
                    'gender' => $gender,
                    'birth_place' => 'Pekalongan',
                    'birth_date' => $lahir,
                    'nik' => $nik,
                    'phone' => '0812-1111-' . str_pad(1 + $i, 4, '0', STR_PAD_LEFT),
                    'email' => $slug . '@gmail.com',
                    'email_madrasah' => $slug . '@mtsfutuhiyyah.sch.id',
                    'province_id' => $provId,
                    'address' => 'Wiradesa, Pekalongan',
                    'status' => $status,
                    'ptk_type' => $ptk,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // tautan mapel (abaikan bila nama mapel tak ada di master)
            $subjectKey = match ($mapel) {
                'BK' => 'Bimbingan Konseling',
                'Operator', 'Tata Usaha', 'Pengasuhan Putra' => null,
                default => $mapel,
            };
            // Bimbingan Konseling tidak ada di master mapel → lewati pivot
            if ($subjectKey && isset($mapelId[$subjectKey])) {
                $exists = DB::table('teacher_subjects')
                    ->where('teacher_id', $teacherId)->where('subject_id', $mapelId[$subjectKey])->exists();
                if (! $exists) {
                    DB::table('teacher_subjects')->insert(['teacher_id' => $teacherId, 'subject_id' => $mapelId[$subjectKey]]);
                }
            }

            // satu ijazah S1 contoh per guru
            if (! DB::table('teacher_educations')->where('teacher_id', $teacherId)->where('level', 'S1')->exists()) {
                DB::table('teacher_educations')->insert([
                    'teacher_id' => $teacherId,
                    'level' => 'S1',
                    'institution_name' => 'IAIN Pekalongan',
                    'graduate_year' => 2015,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // tetapkan wali kelas untuk 9 kelas dari 9 guru pertama yang aktif
        $waliIds = DB::table('teachers')->where('status', 'aktif')->orderBy('id')->limit(9)->pluck('id');
        $kelasNames = ['VII-A', 'VII-B', 'VII-C', 'VIII-A', 'VIII-B', 'VIII-C', 'IX-A', 'IX-B', 'IX-C'];
        foreach ($kelasNames as $idx => $nama) {
            if (isset($waliIds[$idx])) {
                DB::table('classrooms')->where('name', $nama)->update(['homeroom_teacher_id' => $waliIds[$idx]]);
            }
        }
    }
}
