@extends('layouts.app')
@php
  $roleLabels = ['admin' => 'Admin', 'kepala' => 'Kepala Madrasah', 'bk' => 'Guru BK', 'pondok' => 'Pengurus Pondok', 'guru' => 'Guru Mapel'];
  $label = $roleLabels[$activeRole] ?? 'Admin';
  $menus = [
    'admin' => ['Dashboard (/admin/dashboard)', 'Data Siswa + Mutasi', 'GTK', 'Akademik (Kelas, Naik Kelas, Mapel, Jadwal)', 'Pelanggaran (Kategori + Data)', 'Absensi', 'Laporan', 'Users & Role', 'Pondok', 'Pengaturan'],
    'kepala' => ['Dashboard Eksekutif', 'Laporan akademik & kesiswaan', 'Monitoring guru, jurnal, absensi'],
    'bk' => ['Dashboard BK', 'Validasi pelanggaran', 'Konseling', 'Tindak lanjut BK', 'Verifikasi prestasi'],
    'pondok' => ['Dashboard asrama', 'Tindak lanjut pelanggaran santri', 'Monitoring absensi & jurnal santri'],
    'guru' => ['Jadwal mengajar hari ini', 'Absensi per jadwal', 'Jurnal mengajar', 'Input pelanggaran ringan', 'Input prestasi'],
  ];
@endphp
@section('title', 'Pratinjau ' . $label . ' — Task 1.2')
@section('breadcrumb', 'Pratinjau ' . $label)
@section('content')
<div class="card shadow-sm card-hover mb-3">
  <div class="card-body d-flex flex-wrap gap-2 align-items-center">
    <span class="badge text-bg-success">Navigasi persisten OK</span>
    <span class="badge text-bg-warning text-dark">Peran: {{ $label }}</span>
    <span class="text-muted small ms-auto">Sidebar + topbar + breadcrumb tampil. Halaman penuh menyusul di Task 1.5–1.15.</span>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-header bg-white fw-bold"><i class="bi bi-list-check me-2 text-futuhiyyah"></i>Menu {{ $label }} yang termuat di sidebar</div>
  <ul class="list-group list-group-flush">
    @foreach ($menus[$activeRole] ?? [] as $m)
      <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $m }}</li>
    @endforeach
  </ul>
</div>
@endsection
