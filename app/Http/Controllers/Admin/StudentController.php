<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\StudentDummy;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $rows = collect(StudentDummy::list());
        if ($request->filled('status')) {
            $rows = $rows->where('status', $request->status);
        }
        if ($request->filled('kelas')) {
            $rows = $rows->where('kelas', $request->kelas);
        }
        if ($request->filled('q')) {
            $q = strtolower($request->q);
            $rows = $rows->filter(fn ($r) => str_contains(strtolower($r['name'] . $r['nisn'] . $r['nis']), $q));
        }

        return view('admin.siswa.index', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => $rows->values()->all(),
            'kelasOptions' => StudentDummy::kelasOptions(),
            'statusOptions' => StudentDummy::statusOptions(),
            'filters' => $request->only(['status', 'kelas', 'q']),
        ]);
    }

    public function create()
    {
        return view('admin.siswa.create', $this->formData(null));
    }

    public function edit($id)
    {
        $row = collect(StudentDummy::list())->firstWhere('id', (int) $id) ?? StudentDummy::list()[0];

        return view('admin.siswa.edit', $this->formData($row));
    }

    public function show($id)
    {
        $row = collect(StudentDummy::list())->firstWhere('id', (int) $id) ?? StudentDummy::list()[0];

        return view('admin.siswa.show', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'row' => $row,
            'profil' => $this->profil360($row),
        ]);
    }

    public function mutasiMasuk()
    {
        return view('admin.mutasi.masuk', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => StudentDummy::mutasiMasuk(),
        ]);
    }

    public function mutasiKeluar()
    {
        return view('admin.mutasi.keluar', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => StudentDummy::mutasiKeluar(),
        ]);
    }

    private function profil360(array $row): array
    {
        $isAhmad = ($row['id'] ?? 1) === 1;

        return [
            'pribadi' => [
                'Nama Lengkap' => $row['name'],
                'NISN / NIS Lokal' => $row['nisn'] . ' / ' . $row['nis'],
                'Tempat, Tanggal Lahir' => $isAhmad ? 'Pekalongan, 14 Mei 2012' : 'Pekalongan, 22 Agustus 2011',
                'Jenis Kelamin' => $isAhmad ? 'Laki-laki' : 'Perempuan',
                'Agama' => 'Islam',
                'Anak ke / Jumlah Saudara' => $isAhmad ? '2 dari 3 bersaudara' : '1 dari 2 bersaudara',
                'HP / Email' => $row['hp'] . ' / ' . strtolower(explode(' ', $row['name'])[0]) . '@student.mtsfutuhiyyah.sch.id',
                'Pondok' => 'Pondok ' . $row['pondok'],
            ],
            'ortu' => [
                'Ayah' => $isAhmad ? 'H. Muhammad Ridwan — Wiraswasta (SMA)' : 'H. Abdul Karim — Petani (SMA)',
                'Ibu' => $row['ibu'] . ' — Ibu Rumah Tangga (SMA)',
                'Penghasilan' => 'Rp2–5 juta per bulan',
                'Bantuan' => $isAhmad ? 'KIP: 3201-0001 (terlampir)' : 'PKH: 3315-0099 (terlampir)',
            ],
            'alamat' => 'Jl. Pesantren No. 12 RT 03/RW 01, Kauman, Wiradesa, Pekalongan, Jawa Tengah',
            'akademik' => [
                ['tahun' => '2024/2025 Genap', 'kelas' => $isAhmad ? 'VI (SD)' : 'VII-A', 'status' => 'lulus', 'ket' => 'Lulus & diterima di MTs Futuhiyyah'],
                ['tahun' => '2025/2026 Ganjil', 'kelas' => $row['kelas'], 'status' => $row['status'], 'ket' => 'Aktif semester berjalan'],
            ],
            'pelanggaran' => $isAhmad ? [
                ['tanggal' => '12 Sep 2025', 'jenis' => 'Terlambat masuk madrasah', 'level' => 'Ringan', 'poin' => 5, 'status' => 'Selesai'],
                ['tanggal' => '26 Sep 2025', 'jenis' => 'Tidak mengikuti pelajaran tanpa izin', 'level' => 'Sedang', 'poin' => 15, 'status' => 'Tindak lanjut BK'],
            ] : [
                ['tanggal' => '8 Sep 2025', 'jenis' => 'Terlambat masuk madrasah', 'level' => 'Ringan', 'poin' => 5, 'status' => 'Selesai'],
            ],
            'prestasi' => StudentDummy::prestasi(),
            'beasiswa' => StudentDummy::beasiswa(),
        ];
    }

    private function formData($row): array
    {
        return [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'row' => $row,
            'isEdit' => ! is_null($row),
            'kelasOptions' => StudentDummy::kelasOptions(),
            'statusOptions' => StudentDummy::statusOptions(),
            'wilayah' => StudentDummy::wilayah(),
            'beasiswa' => StudentDummy::beasiswa(),
            'prestasi' => StudentDummy::prestasi(),
        ];
    }
}
