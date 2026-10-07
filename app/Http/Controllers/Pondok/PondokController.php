<?php

namespace App\Http\Controllers\Pondok;

use App\Http\Controllers\Controller;
use App\Support\PondokDummy;

class PondokController extends Controller
{
    private function base(): array
    {
        return ['activeRole' => 'pondok', 'userName' => 'Ustadz Pengasuh Pondok'];
    }

    public function dashboard()
    {
        return view('pondok.dashboard', $this->base() + [
            'stats' => PondokDummy::ringkasan(),
            'pelanggaran' => PondokDummy::pelanggaran(),
        ]);
    }

    public function pelanggaran()
    {
        return view('pondok.pelanggaran', $this->base() + [
            'rows' => PondokDummy::pelanggaran(),
        ]);
    }

    public function monitoring()
    {
        return view('pondok.monitoring', $this->base() + [
            'rows' => PondokDummy::monitoring(),
        ]);
    }
}
