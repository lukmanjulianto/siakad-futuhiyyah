@extends('layouts.app')
@section('title', 'Absensi Guru — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Absensi')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-1">Absensi per Jadwal</h1>
  <p class="text-muted small mb-0">Pilih jadwal hari ini → tandai Hadir/Sakit/Izin/Alpha per santri → simpan. Edit 1×24 jam.</p>
</div></div>
<form method="GET" class="card shadow-sm mb-3"><div class="card-body p-3 d-flex flex-wrap gap-2 align-items-end">
  <div class="flex-grow-1"><label class="form-label small fw-bold">Jadwal mengajar</label><select name="jadwal" class="form-select" onchange="this.form.submit()">@foreach ($jadwal as $j)<option {{ $jadwalAktif === $j['mapel'] . ' • ' . $j['kelas'] . ' • ' . $j['jam'] ? 'selected' : '' }}>{{ $j['mapel'] }} • {{ $j['kelas'] }} • {{ $j['jam'] }}</option>@endforeach</select></div>
  <span class="badge text-bg-success">{{ $jadwalAktif }}</span>
</div></form>
<div class="card shadow-sm"><div class="card-body p-3">
  <div class="table-responsive"><table class="table table-hover small align-middle mb-0">
    <thead class="table-light"><tr><th>NIS</th><th>Nama</th><th class="text-center">Hadir</th><th class="text-center">Sakit</th><th class="text-center">Izin</th><th class="text-center">Alpha</th></tr></thead>
    <tbody>
      @foreach ($siswa as $s)
        <tr>
          <td>{{ $s['nis'] }}</td><td class="fw-bold">{{ $s['nama'] }}</td>
          @foreach (['hadir', 'sakit', 'izin', 'alpha'] as $st)
            <td class="text-center"><input type="radio" class="form-check-input" name="st-{{ $s['nis'] }}" {{ $s['status'] === $st ? 'checked' : '' }}></td>
          @endforeach
        </tr>
      @endforeach
    </tbody>
  </table></div>
  <button class="btn btn-success mt-3"><i class="bi bi-save me-1"></i>Simpan Absensi (Demo Fase 1)</button>
</div></div>
@endsection
