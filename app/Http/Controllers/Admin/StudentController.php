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
