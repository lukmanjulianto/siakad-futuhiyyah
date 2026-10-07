<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\PelanggaranDummy;

class PelanggaranController extends Controller
{
    public function kategori()
    {
        return view('admin.pelanggaran.kategori', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => PelanggaranDummy::kategori(),
        ]);
    }

    public function data()
    {
        return view('admin.pelanggaran.data', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => PelanggaranDummy::data(),
            'statusOptions' => PelanggaranDummy::statusOptions(),
            'alur' => PelanggaranDummy::alur(),
        ]);
    }
}
