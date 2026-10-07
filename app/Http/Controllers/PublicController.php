<?php

namespace App\Http\Controllers;

use App\Support\PublicDummy;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home', [
            'stats' => PublicDummy::homeStats(),
        ]);
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function cekSiswa()
    {
        return view('public.cek-siswa', [
            'examples' => PublicDummy::students(),
        ]);
    }

    public function cekHasil(Request $request)
    {
        $key = $request->query('siswa', 'ahmad');
        $students = PublicDummy::students();
        if (! isset($students[$key])) {
            $key = 'ahmad';
        }
        $student = $students[$key];

        return view('public.cek-hasil', [
            'student' => $student,
            'students' => $students,
            'activeKey' => $key,
            'absences' => PublicDummy::absences($key),
            'violations' => PublicDummy::violations($key),
            'pie' => PublicDummy::violationPie($key),
            'totalPoin' => collect(PublicDummy::violations($key))->sum('poin'),
            'journals' => PublicDummy::journals($key),
            'achievements' => PublicDummy::achievements($key),
        ]);
    }
}
