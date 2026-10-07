<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// PRD Bab 5 & 6.A: 5 role + permission menu + akun demo (backend dipakai Task 2.3/2.4)
class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'siswa.kelola', 'siswa.lihat',
            'gtk.kelola', 'gtk.lihat',
            'mutasi.kelola', 'mutasi.lihat',
            'akademik.kelola', 'akademik.lihat',
            'absensi.input', 'absensi.lihat',
            'jurnal.input', 'jurnal.lihat',
            'pelanggaran.input', 'pelanggaran.validasi', 'pelanggaran.pondok', 'pelanggaran.lihat',
            'konseling.kelola',
            'prestasi.input', 'prestasi.verifikasi', 'prestasi.lihat',
            'laporan.ekspor',
            'users.kelola',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        $matrix = [
            'admin' => $permissions,
            'kepala' => ['siswa.lihat', 'gtk.lihat', 'mutasi.lihat', 'akademik.lihat', 'absensi.lihat', 'jurnal.lihat', 'pelanggaran.lihat', 'prestasi.lihat', 'laporan.ekspor'],
            'bk' => ['siswa.lihat', 'mutasi.lihat', 'absensi.lihat', 'jurnal.lihat', 'pelanggaran.validasi', 'pelanggaran.lihat', 'konseling.kelola', 'prestasi.verifikasi', 'prestasi.lihat', 'laporan.ekspor'],
            'pondok' => ['siswa.lihat', 'mutasi.lihat', 'absensi.lihat', 'jurnal.lihat', 'pelanggaran.pondok', 'pelanggaran.lihat', 'prestasi.lihat', 'laporan.ekspor'],
            'guru' => ['akademik.lihat', 'absensi.input', 'jurnal.input', 'pelanggaran.input', 'prestasi.input'],
        ];

        foreach ($matrix as $role => $perms) {
            $r = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
            $r->syncPermissions($perms);
        }

        $users = [
            ['name' => 'Administrator', 'email' => 'admin@mtsfutuhiyyah.sch.id', 'role' => 'admin', 'status' => 'active'],
            ['name' => 'Ustadz Abdul Halim, M.Pd', 'email' => 'abdulhalim@mtsfutuhiyyah.sch.id', 'role' => 'kepala', 'status' => 'active'],
            ['name' => 'Ustadzah Nur Laila, S.Ag', 'email' => 'nurlaila@mtsfutuhiyyah.sch.id', 'role' => 'bk', 'status' => 'active'],
            ['name' => 'Ustadz Ridwan Hakim', 'email' => 'ridwan@mtsfutuhiyyah.sch.id', 'role' => 'pondok', 'status' => 'active'],
            ['name' => 'Ustadz Muhammad Fauzan, S.Pd.I', 'email' => 'fauzan@mtsfutuhiyyah.sch.id', 'role' => 'guru', 'status' => 'active'],
            ['name' => 'Ustadz Yusuf Maulana, S.Pd', 'email' => 'yusuf.baru@gmail.com', 'role' => 'guru', 'status' => 'pending'],
        ];

        foreach ($users as $u) {
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => Hash::make('Futuhiyyah123'),
                    'status' => $u['status'],
                    'email_verified_at' => $u['status'] === 'active' ? now() : null,
                ]
            );
            $user->syncRoles([$u['role']]);
        }
    }
}
