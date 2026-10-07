<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\AkademikDummy;
use App\Support\GtkDummy;
use App\Support\StudentDummy;

class AkademikController extends Controller
{
    public function kelas()
    {
        return view('admin.akademik.kelas', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => AkademikDummy::kelas(),
        ]);
    }

    public function naikKelas()
    {
        return view('admin.akademik.naik-kelas', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'siswa' => AkademikDummy::naikKelasSiswa(),
            'kelasOptions' => StudentDummy::kelasOptions(),
        ]);
    }

    public function mapel()
    {
        return view('admin.akademik.mapel', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => AkademikDummy::mapel(),
        ]);
    }

    public function jadwal()
    {
        return view('admin.akademik.jadwal', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => AkademikDummy::templates(),
        ]);
    }

    public function jadwalSetting($template)
    {
        $tpl = collect(AkademikDummy::templates())->firstWhere('id', $template) ?? AkademikDummy::templates()[0];

        return view('admin.akademik.jadwal-setting', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'tpl' => $tpl,
            'days' => AkademikDummy::days(),
            'grid' => AkademikDummy::grid(),
            'periods' => [1, 2, 3, 4, 5, 6],
            'mapelOptions' => GtkDummy::mapelOptions(),
            'kelasOptions' => StudentDummy::kelasOptions(),
        ]);
    }
}
