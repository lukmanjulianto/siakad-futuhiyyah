<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Support\KepalaDummy;
use App\Support\OperasionalDummy;
use App\Support\StudentDummy;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    private function base(): array
    {
        return ['activeRole' => 'kepala', 'userName' => 'Ustadz Abdul Halim, M.Pd'];
    }

    public function dashboard()
    {
        return view('kepala.dashboard', $this->base() + [
            'stats' => KepalaDummy::stats(),
            'pie' => KepalaDummy::pelanggaranPerLevel(),
            'monitoring' => KepalaDummy::monitoring(),
        ]);
    }

    public function laporan(Request $request)
    {
        $jenis = $request->input('jenis', 'absensi');

        return view('kepala.laporan', $this->base() + [
            'jenisOptions' => OperasionalDummy::jenisLaporan(),
            'jenis' => $jenis,
            'preview' => OperasionalDummy::preview($jenis),
            'filename' => $jenis . '_2025-2026-ganjil_' . date('Ymd-His'),
        ]);
    }

    public function monitoring()
    {
        return view('kepala.monitoring', $this->base() + [
            'rows' => KepalaDummy::monitoring(),
            'kelasOptions' => StudentDummy::kelasOptions(),
        ]);
    }
}
