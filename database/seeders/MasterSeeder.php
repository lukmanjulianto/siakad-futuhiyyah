<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// PRD Task 2.2: TA 2025/2026, 2 pondok, 9 kelas, 16 mapel MTs, 6 kategori pelanggaran.
// Wilayah: data kurasi Pekalongan + sekitar (tanpa paket laravolt yang skemanya beda).
class MasterSeeder extends Seeder
{
    public function run(): void
    {
        $taAktif = DB::table('academic_years')->updateOrInsert(
            ['year' => '2025/2026', 'semester' => 'Ganjil'],
            ['start_date' => '2025-07-14', 'end_date' => '2025-12-20', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()]
        );
        DB::table('academic_years')->updateOrInsert(
            ['year' => '2024/2025', 'semester' => 'Genap'],
            ['start_date' => '2025-01-06', 'end_date' => '2025-06-21', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()]
        );
        // pastikan hanya satu yang aktif
        $aktifId = DB::table('academic_years')->where('year', '2025/2026')->where('semester', 'Ganjil')->value('id');
        DB::table('academic_years')->where('id', '!=', $aktifId)->update(['is_active' => false]);

        foreach ([
            ['name' => 'Pondok Futuhiyyah Putra', 'gender' => 'L', 'pengasuh' => 'KH. Ahmad Fauzi', 'address' => 'Jl. Pesantren No. 1, Wiradesa, Pekalongan'],
            ['name' => 'Pondok Futuhiyyah Putri', 'gender' => 'P', 'pengasuh' => 'Nyai Hj. Maryam', 'address' => 'Jl. Pesantren No. 2, Wiradesa, Pekalongan'],
        ] as $p) {
            DB::table('pondoks')->updateOrInsert(['name' => $p['name']], $p + ['created_at' => now(), 'updated_at' => now()]);
        }

        foreach (['VII-A', 'VII-B', 'VII-C', 'VIII-A', 'VIII-B', 'VIII-C', 'IX-A', 'IX-B', 'IX-C'] as $nama) {
            DB::table('classrooms')->updateOrInsert(
                ['name' => $nama],
                ['level' => explode('-', $nama)[0], 'capacity' => 32, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        foreach ([
            ['QHD', "Al-Qur'an Hadits", 'agama'], ['FQH', 'Fiqih', 'agama'], ['AQH', 'Akidah Akhlak', 'agama'],
            ['SKI', 'SKI', 'agama'], ['ARB', 'Bahasa Arab', 'agama'], ['BIN', 'Bahasa Indonesia', 'umum'],
            ['BIG', 'Bahasa Inggris', 'umum'], ['MTK', 'Matematika', 'umum'], ['IPA', 'IPA', 'umum'],
            ['IPS', 'IPS', 'umum'], ['PKN', 'PKn', 'umum'], ['SNB', 'Seni Budaya', 'umum'],
            ['PJK', 'PJOK', 'umum'], ['PRK', 'Prakarya', 'umum'], ['NHW', 'Nahwu', 'muatan_lokal'], ['SHR', 'Shorof', 'muatan_lokal'],
        ] as [$code, $name, $group]) {
            DB::table('subjects')->updateOrInsert(['code' => $code], ['name' => $name, 'group' => $group, 'created_at' => now(), 'updated_at' => now()]);
        }

        foreach ([
            ['Terlambat masuk madrasah', 'ringan', 5, 'Teguran lisan + mencatat di buku pelanggaran'],
            ['Tidak memakai atribut lengkap', 'ringan', 5, 'Teguran + melengkapi atribut hari itu juga'],
            ['Tidak mengikuti pelajaran tanpa izin', 'sedang', 15, 'Surat pemberitahuan orang tua + konseling BK'],
            ['Keluar pondok tanpa izin pengasuh', 'sedang', 20, 'Pembinaan pengasuh + surat pernyataan santri'],
            ['Berkelahi dengan santri lain', 'berat', 40, 'Skorsing 3 hari + mediasi BK bersama wali'],
            ['Mencuri', 'berat', 50, 'Skorsing + sidang kepala madrasah bersama pengurus pondok'],
        ] as [$name, $level, $points, $sanction]) {
            DB::table('violation_categories')->updateOrInsert(['name' => $name], compact('level', 'points', 'sanction') + ['created_at' => now(), 'updated_at' => now()]);
        }

        // ---- Wilayah kurasi (Jawa Tengah fokus + tetangga) ----
        $wilayah = [
            'Jawa Tengah' => [
                'Pekalongan' => ['Wiradesa' => ['Kauman', 'Mayangan'], 'Kajen' => ['Kajen', 'Sambiroto']],
                'Batang' => ['Batang' => ['Kauman', 'Kasepuhan'], 'Limpung' => ['Limpung', 'Tembok']],
            ],
            'Jawa Barat' => [
                'Cirebon' => ['Sumber' => ['Sumber', 'Kaliwadas']],
            ],
            'Jawa Timur' => [
                'Jombang' => ['Jombang' => ['Jombatan', 'Kepanjen']],
            ],
            'DI Yogyakarta' => [
                'Sleman' => ['Depok' => ['Condongcatur', 'Maguwoharjo']],
            ],
        ];

        foreach ($wilayah as $prov => $regs) {
            $provId = DB::table('provinces')->where('name', $prov)->value('id')
                ?? DB::table('provinces')->insertGetId(['name' => $prov]);
            foreach ($regs as $reg => $dists) {
                $regId = DB::table('regencies')->where('name', $reg)->value('id')
                    ?? DB::table('regencies')->insertGetId(['province_id' => $provId, 'name' => $reg]);
                foreach ($dists as $dist => $vils) {
                    $distId = DB::table('districts')->where('name', $dist)->value('id')
                        ?? DB::table('districts')->insertGetId(['regency_id' => $regId, 'name' => $dist]);
                    foreach ($vils as $vil) {
                        if (! DB::table('villages')->where('name', $vil)->exists()) {
                            DB::table('villages')->insert(['district_id' => $distId, 'name' => $vil, 'postal_code' => '51152']);
                        }
                    }
                }
            }
        }
    }
}
