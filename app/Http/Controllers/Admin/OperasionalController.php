<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\OperasionalDummy;
use App\Support\StudentDummy;
use Illuminate\Http\Request;

class OperasionalController extends Controller
{
    public function absensi(Request $request)
    {
        $rows = collect(OperasionalDummy::rekap());
        if ($request->filled('kelas')) {
            $rows = $rows->where('kelas', $request->kelas);
        }

        return view('admin.absensi.index', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'rows' => $rows->values()->all(),
            'kelasOptions' => StudentDummy::kelasOptions(),
            'tanggal' => $request->input('tanggal', '2025-10-06'),
            'filterKelas' => $request->input('kelas', ''),
        ]);
    }

    public function laporan(Request $request)
    {
        $jenis = $request->input('jenis', 'absensi');

        return view('admin.laporan.index', [
            'activeRole' => 'admin',
            'userName' => 'Administrator',
            'jenisOptions' => OperasionalDummy::jenisLaporan(),
            'jenis' => $jenis,
            'dari' => $request->input('dari', '2025-09-01'),
            'sampai' => $request->input('sampai', '2025-10-06'),
            'kelas' => $request->input('kelas', ''),
            'kelasOptions' => StudentDummy::kelasOptions(),
            'preview' => OperasionalDummy::preview($jenis),
            'filename' => $jenis . '_2025-2026-ganjil_' . date('Ymd-His'),
        ]);
    }
}
