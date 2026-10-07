<?php

namespace App\Http\Controllers\Bk;

use App\Http\Controllers\Controller;
use App\Support\BkDummy;
use App\Support\PelanggaranDummy;

class BkController extends Controller
{
    private function base(): array
    {
        return ['activeRole' => 'bk', 'userName' => 'Ustadzah Nur Laila, S.Ag'];
    }

    public function dashboard()
    {
        return view('bk.dashboard', $this->base() + [
            'stats' => BkDummy::ringkasan(),
            'antrean' => BkDummy::antrean(),
        ]);
    }

    public function pelanggaran()
    {
        return view('bk.pelanggaran', $this->base() + [
            'rows' => PelanggaranDummy::data(),
            'statusOptions' => PelanggaranDummy::statusOptions(),
        ]);
    }

    public function konseling()
    {
        return view('bk.konseling', $this->base() + [
            'rows' => BkDummy::konseling(),
        ]);
    }

    public function tindakLanjut()
    {
        return view('bk.tindak-lanjut', $this->base() + [
            'rows' => BkDummy::tindakLanjut(),
            'statusOptions' => PelanggaranDummy::statusOptions(),
        ]);
    }

    public function prestasi()
    {
        return view('bk.prestasi', $this->base() + [
            'rows' => BkDummy::prestasi(),
        ]);
    }
}
