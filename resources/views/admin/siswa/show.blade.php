@extends('layouts.app')
@section('title', 'Profil 360° ' . $row['name'] . ' — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Profil Siswa 360°')
@section('content')
@php
  $totalPoin = collect($profil['pelanggaran'])->sum('poin');
  $badge = ['aktif' => 'success', 'aktif_mutasi_masuk' => 'info', 'mutasi_keluar' => 'warning', 'lulus' => 'secondary', 'nonaktif' => 'secondary'];
@endphp
<div class="card shadow-sm border-0 mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-3 align-items-center">
    <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center fw-bold fs-4" style="width:72px;height:72px;">{{ strtoupper(substr(explode(' ', $row['name'])[0], 0, 1) . substr(explode(' ', $row['name'])[1] ?? '', 0, 1)) }}</span>
    <div>
      <h1 class="h5 fw-bold mb-0">{{ $row['name'] }}</h1>
      <p class="text-muted small mb-1">NIS {{ $row['nis'] }} • NISN {{ $row['nisn'] }} • Kelas {{ $row['kelas'] }} • Pondok {{ $row['pondok'] }}</p>
      <span class="badge text-bg-{{ $badge[$row['status']] ?? 'secondary' }}">{{ $row['status'] }}</span>
      <span class="badge text-bg-warning text-dark ms-1">{{ $totalPoin }} poin pelanggaran</span>
    </div>
    <div class="ms-auto d-flex gap-2">
      <a href="{{ route('admin.siswa.edit', $row['id']) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil me-1"></i>Ubah</a>
      <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left me-1"></i>Daftar</a>
    </div>
  </div>
</div>

<div class="row g-3">
  <div class="col-lg-6">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-person me-2 text-futuhiyyah"></i>Data Pribadi</h2>
      <dl class="row small mb-0">
        @foreach ($profil['pribadi'] as $k => $v)
          <dt class="col-sm-4 text-muted">{{ $k }}</dt><dd class="col-sm-8">{{ $v }}</dd>
        @endforeach
      </dl>
    </div></div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-people me-2 text-futuhiyyah"></i>Orang Tua & Alamat</h2>
      <dl class="row small mb-0">
        @foreach ($profil['ortu'] as $k => $v)
          <dt class="col-sm-4 text-muted">{{ $k }}</dt><dd class="col-sm-8">{{ $v }}</dd>
        @endforeach
        <dt class="col-sm-4 text-muted">Alamat</dt><dd class="col-sm-8">{{ $profil['alamat'] }}</dd>
      </dl>
    </div></div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-mortarboard me-2 text-futuhiyyah"></i>Riwayat Belajar</h2>
      <div class="table-responsive"><table class="table table-sm small align-middle mb-0">
        <thead class="table-light"><tr><th>Tahun</th><th>Kelas</th><th>Status</th><th>Keterangan</th></tr></thead>
        <tbody>@foreach ($profil['akademik'] as $a)<tr><td>{{ $a['tahun'] }}</td><td>{{ $a['kelas'] }}</td><td>{{ $a['status'] }}</td><td>{{ $a['ket'] }}</td></tr>@endforeach</tbody>
      </table></div>
    </div></div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-exclamation-triangle me-2 text-warning"></i>Pelanggaran ({{ $totalPoin }} poin)</h2>
      <div class="table-responsive"><table class="table table-sm small align-middle mb-0">
        <thead class="table-light"><tr><th>Tanggal</th><th>Jenis</th><th>Poin</th><th>Status</th></tr></thead>
        <tbody>@foreach ($profil['pelanggaran'] as $p)<tr><td>{{ $p['tanggal'] }}</td><td>{{ $p['jenis'] }}</td><td class="fw-bold">{{ $p['poin'] }}</td><td>{{ $p['status'] }}</td></tr>@endforeach</tbody>
      </table></div>
    </div></div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-award me-2 text-gold"></i>Prestasi</h2>
      <ul class="list-group list-group-flush small">
        @foreach ($profil['prestasi'] as $p)<li class="list-group-item px-0"><span class="fw-bold">{{ $p['nama'] }}</span><br><span class="text-muted">{{ $p['tanggal'] }} • {{ $p['tingkat'] }} • {{ $p['penyelenggara'] }}</span></li>@endforeach
      </ul>
    </div></div>
  </div>
  <div class="col-lg-6">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-cash-coin me-2 text-futuhiyyah"></i>Beasiswa</h2>
      <ul class="list-group list-group-flush small">
        @foreach ($profil['beasiswa'] as $b)<li class="list-group-item px-0"><span class="fw-bold">{{ $b['nama'] }}</span><br><span class="text-muted">{{ $b['tahun'] }} • {{ $b['kategori'] }} • {{ $b['nominal'] }}</span></li>@endforeach
      </ul>
    </div></div>
  </div>
</div>
@endsection
