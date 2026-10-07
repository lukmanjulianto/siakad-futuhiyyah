<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Support\GuruDummy;
use App\Support\PelanggaranDummy;
use App\Support\StudentDummy;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    private function base(): array
    {
        return ['activeRole' => 'guru', 'userName' => 'Ustadz Muhammad Fauzan, S.Pd.I'];
    }

    public function dashboard()
    {
        return view('guru.dashboard', $this->base() + [
            'jadwal' => GuruDummy::jadwalHariIni(),
        ]);
    }

    public function absensi(Request $request)
    {
        return view('guru.absensi', $this->base() + [
            'jadwal' => GuruDummy::jadwalHariIni(),
            'jadwalAktif' => $request->input('jadwal', 'Fiqih • VII-A • 07.00–08.20'),
            'siswa' => GuruDummy::daftarAbsensi(),
        ]);
    }

    public function jurnal()
    {
        return view('guru.jurnal', $this->base() + [
            'jadwal' => GuruDummy::jadwalHariIni(),
            'riwayat' => GuruDummy::riwayatJurnal(),
        ]);
    }

    public function pelanggaran()
    {
        return view('guru.pelanggaran', $this->base() + [
            'kategori' => PelanggaranDummy::kategori(),
            'siswa' => StudentDummy::list(),
        ]);
    }

    public function prestasi()
    {
        return view('guru.prestasi', $this->base());
    }
}
