<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\GtkDummy;
use App\Support\StudentDummy;
use Illuminate\Http\Request;

class GtkController extends Controller
{
    public function index(Request $request)
    {
        $rows = collect(GtkDummy::list());
        if ($request->filled('status')) {
            $rows = $rows->where('status', $request->status);
        }
        if ($request->filled('ptk')) {
            $rows = $rows->where('ptk', $request->ptk);
        }
        if ($request->filled('q')) {
            $q = strtolower($request->q);
            $rows = $rows->filter(fn ($r) => str_contains(strtolower($r['name'] . $r['nik'] . $r['mapel']), $q));
        }

        return view('admin.gtk.index', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => $rows->values()->all(),
            'statusOptions' => GtkDummy::statusOptions(),
            'ptkOptions' => GtkDummy::ptkOptions(),
            'filters' => $request->only(['status', 'ptk', 'q']),
        ]);
    }

    public function create()
    {
        return view('admin.gtk.create', $this->formData(null));
    }

    public function edit($id)
    {
        $row = collect(GtkDummy::list())->firstWhere('id', (int) $id) ?? GtkDummy::list()[0];

        return view('admin.gtk.edit', $this->formData($row));
    }

    private function formData($row): array
    {
        return [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'row' => $row,
            'isEdit' => ! is_null($row),
            'statusOptions' => GtkDummy::statusOptions(),
            'ptkOptions' => GtkDummy::ptkOptions(),
            'mapelOptions' => GtkDummy::mapelOptions(),
            'wilayah' => StudentDummy::wilayah(),
            'educations' => GtkDummy::educations(),
        ];
    }
}
