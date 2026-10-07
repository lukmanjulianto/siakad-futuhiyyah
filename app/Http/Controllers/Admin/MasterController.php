<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\MasterDummy;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function users(Request $request)
    {
        $rows = collect(MasterDummy::users());
        if ($request->filled('role')) {
            $rows = $rows->where('role', $request->role);
        }
        if ($request->filled('q')) {
            $q = strtolower($request->q);
            $rows = $rows->filter(fn ($r) => str_contains(strtolower($r['nama'] . $r['email']), $q));
        }

        return view('admin.users.index', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => $rows->values()->all(),
            'roles' => MasterDummy::roles(),
            'filterRole' => $request->input('role', ''),
            'q' => $request->input('q', ''),
        ]);
    }

    public function pondok()
    {
        return view('admin.pondok.index', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'pondoks' => MasterDummy::pondoks(),
            'pengurus' => MasterDummy::pengurus(),
        ]);
    }
}
