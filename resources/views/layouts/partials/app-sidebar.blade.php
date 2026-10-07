{{-- Sidebar role-aware: memuat menu 5 role (PRD Bab 3C-3G & Bab 5). Fase 1: tampil sesuai $activeRole, bisa pratinjau via dropdown peran. --}}
@php
  $activeRole = $activeRole ?? request()->segment(1) ?: 'admin';
  $is = fn ($pattern) => request()->is($pattern) ? 'active' : '';
  $open = fn ($pattern) => request()->is($pattern) ? 'menu-open' : '';
@endphp
<aside class="app-sidebar sidebar-futuhiyyah shadow" data-bs-theme="dark">
  <div class="sidebar-brand p-3 d-flex align-items-center gap-2 text-white text-decoration-none">
    <span class="bg-white text-futuhiyyah rounded-2 d-inline-flex align-items-center justify-content-center" style="width:36px;height:36px;"><i class="bi bi-moon-stars-fill"></i></span>
    <span class="fw-bold">SIAKAD <span class="text-gold">Futuhiyyah</span></span>
  </div>
  <div class="sidebar-wrapper">
    <nav class="mt-2 px-2 pb-3">
      <ul class="nav nav-pills flex-column gap-1" data-lte-toggle="treeview" role="menu" data-accordion="false">

        {{-- ============ ADMIN ============ --}}
        @if ($activeRole === 'admin')
          <li class="nav-header text-white-50 small">ADMIN</li>
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ $is('admin/dashboard') }}">
              <i class="bi bi-speedometer2 me-2"></i>Dashboard
            </a>
          </li>
          <li class="nav-item {{ $open('admin/siswa*') }}">
            <a href="#" class="nav-link {{ $is('admin/siswa*') }}">
              <i class="bi bi-people me-2"></i>Data Siswa<i class="bi bi-chevron-down ms-auto small"></i>
            </a>
            <ul class="nav nav-treeview ms-3">
              <li class="nav-item"><a href="{{ url('/admin/siswa') }}" class="nav-link {{ $is('admin/siswa') }}"><i class="bi bi-circle-fill me-2 small"></i>Daftar Siswa</a></li>
              <li class="nav-item"><a href="{{ url('/admin/siswa/create') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Tambah Siswa</a></li>
            </ul>
          </li>
          <li class="nav-item {{ $open('admin/mutasi*') }}">
            <a href="#" class="nav-link {{ $is('admin/mutasi*') }}">
              <i class="bi bi-arrow-left-right me-2"></i>Mutasi<i class="bi bi-chevron-down ms-auto small"></i>
            </a>
            <ul class="nav nav-treeview ms-3">
              <li class="nav-item"><a href="{{ url('/admin/mutasi/masuk') }}" class="nav-link {{ $is('admin/mutasi/masuk') }}"><i class="bi bi-circle-fill me-2 small"></i>Mutasi Masuk</a></li>
              <li class="nav-item"><a href="{{ url('/admin/mutasi/keluar') }}" class="nav-link {{ $is('admin/mutasi/keluar') }}"><i class="bi bi-circle-fill me-2 small"></i>Mutasi Keluar</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="{{ url('/admin/gtk') }}" class="nav-link {{ $is('admin/gtk*') }}"><i class="bi bi-person-badge me-2"></i>GTK</a></li>
          <li class="nav-item {{ $open('admin/akademik*') }}">
            <a href="#" class="nav-link {{ $is('admin/akademik*') }}">
              <i class="bi bi-mortarboard me-2"></i>Akademik<i class="bi bi-chevron-down ms-auto small"></i>
            </a>
            <ul class="nav nav-treeview ms-3">
              <li class="nav-item"><a href="{{ url('/admin/akademik/kelas') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Kelas</a></li>
              <li class="nav-item"><a href="{{ url('/admin/akademik/naik-kelas') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Naik Kelas</a></li>
              <li class="nav-item"><a href="{{ url('/admin/akademik/mapel') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Mapel</a></li>
              <li class="nav-item"><a href="{{ url('/admin/akademik/jadwal') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Jadwal</a></li>
            </ul>
          </li>
          <li class="nav-item {{ $open('admin/pelanggaran*') }}">
            <a href="#" class="nav-link {{ $is('admin/pelanggaran*') }}">
              <i class="bi bi-exclamation-triangle me-2"></i>Pelanggaran<i class="bi bi-chevron-down ms-auto small"></i>
            </a>
            <ul class="nav nav-treeview ms-3">
              <li class="nav-item"><a href="{{ url('/admin/pelanggaran/kategori') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Kategori</a></li>
              <li class="nav-item"><a href="{{ url('/admin/pelanggaran/data') }}" class="nav-link"><i class="bi bi-circle-fill me-2 small"></i>Data</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="{{ url('/admin/absensi') }}" class="nav-link {{ $is('admin/absensi*') }}"><i class="bi bi-calendar-check me-2"></i>Absensi</a></li>
          <li class="nav-item"><a href="{{ url('/admin/laporan') }}" class="nav-link {{ $is('admin/laporan*') }}"><i class="bi bi-file-earmark-bar-graph me-2"></i>Laporan</a></li>
          <li class="nav-item"><a href="{{ url('/admin/users') }}" class="nav-link {{ $is('admin/users*') }}"><i class="bi bi-people-fill me-2"></i>Users & Role</a></li>
          <li class="nav-item"><a href="{{ url('/admin/pondok') }}" class="nav-link {{ $is('admin/pondok*') }}"><i class="bi bi-house-heart me-2"></i>Pondok</a></li>
          <li class="nav-item"><a href="{{ url('/admin/pengaturan') }}" class="nav-link {{ $is('admin/pengaturan*') }}"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
        @endif

        {{-- ============ KEPALA MADRASAH ============ --}}
        @if ($activeRole === 'kepala')
          <li class="nav-header text-white-50 small">KEPALA MADRASAH</li>
          <li class="nav-item"><a href="{{ url('/kepala/dashboard') }}" class="nav-link {{ $is('kepala/dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard Eksekutif</a></li>
          <li class="nav-item"><a href="{{ url('/kepala/laporan') }}" class="nav-link {{ $is('kepala/laporan') }}"><i class="bi bi-file-earmark-bar-graph me-2"></i>Laporan</a></li>
          <li class="nav-item"><a href="{{ url('/kepala/monitoring') }}" class="nav-link {{ $is('kepala/monitoring') }}"><i class="bi bi-eye me-2"></i>Monitoring</a></li>
          <li class="nav-header text-white-50 small">AKSES LIHAT</li>
          <li class="nav-item"><a href="{{ url('/kepala/dashboard') }}" class="nav-link"><i class="bi bi-people me-2"></i>Data Siswa (lihat)</a></li>
          <li class="nav-item"><a href="{{ url('/kepala/monitoring') }}" class="nav-link"><i class="bi bi-journal-text me-2"></i>Jurnal & Absensi (lihat)</a></li>
        @endif

        {{-- ============ GURU BK ============ --}}
        @if ($activeRole === 'bk')
          <li class="nav-header text-white-50 small">GURU BK</li>
          <li class="nav-item"><a href="{{ url('/bk/dashboard') }}" class="nav-link {{ $is('bk/dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard BK</a></li>
          <li class="nav-item"><a href="{{ url('/bk/pelanggaran') }}" class="nav-link {{ $is('bk/pelanggaran') }}"><i class="bi bi-shield-check me-2"></i>Validasi Pelanggaran</a></li>
          <li class="nav-item"><a href="{{ url('/bk/konseling') }}" class="nav-link {{ $is('bk/konseling') }}"><i class="bi bi-chat-heart me-2"></i>Konseling</a></li>
          <li class="nav-item"><a href="{{ url('/bk/tindak-lanjut') }}" class="nav-link {{ $is('bk/tindak-lanjut') }}"><i class="bi bi-arrow-repeat me-2"></i>Tindak Lanjut</a></li>
          <li class="nav-item"><a href="{{ url('/bk/prestasi') }}" class="nav-link {{ $is('bk/prestasi') }}"><i class="bi bi-award me-2"></i>Prestasi</a></li>
        @endif

        {{-- ============ PENGURUS PONDOK ============ --}}
        @if ($activeRole === 'pondok')
          <li class="nav-header text-white-50 small">PENGURUS PONDOK</li>
          <li class="nav-item"><a href="{{ url('/pondok/dashboard') }}" class="nav-link {{ $is('pondok/dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard Asrama</a></li>
          <li class="nav-item"><a href="{{ url('/pondok/pelanggaran') }}" class="nav-link {{ $is('pondok/pelanggaran') }}"><i class="bi bi-exclamation-triangle me-2"></i>Pelanggaran Santri</a></li>
          <li class="nav-item"><a href="{{ url('/pondok/monitoring') }}" class="nav-link {{ $is('pondok/monitoring') }}"><i class="bi bi-eye me-2"></i>Monitoring</a></li>
        @endif

        {{-- ============ GURU MAPEL ============ --}}
        @if ($activeRole === 'guru')
          <li class="nav-header text-white-50 small">GURU MAPEL</li>
          <li class="nav-item"><a href="{{ url('/guru/dashboard') }}" class="nav-link {{ $is('guru/dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Jadwal Hari Ini</a></li>
          <li class="nav-item"><a href="{{ url('/guru/absensi') }}" class="nav-link {{ $is('guru/absensi') }}"><i class="bi bi-calendar-check me-2"></i>Absensi</a></li>
          <li class="nav-item"><a href="{{ url('/guru/jurnal') }}" class="nav-link {{ $is('guru/jurnal') }}"><i class="bi bi-journal-text me-2"></i>Jurnal Mengajar</a></li>
          <li class="nav-item"><a href="{{ url('/guru/pelanggaran') }}" class="nav-link {{ $is('guru/pelanggaran') }}"><i class="bi bi-exclamation-triangle me-2"></i>Input Pelanggaran</a></li>
          <li class="nav-item"><a href="{{ url('/guru/prestasi') }}" class="nav-link {{ $is('guru/prestasi') }}"><i class="bi bi-award me-2"></i>Input Prestasi</a></li>
        @endif

        <li class="nav-header text-white-50 small">PUBLIK</li>
        <li class="nav-item"><a href="{{ route('public.home') }}" class="nav-link"><i class="bi bi-house-door me-2"></i>Beranda</a></li>
        <li class="nav-item"><a href="{{ route('public.cek-siswa') }}" class="nav-link"><i class="bi bi-person-search me-2"></i>Cek Data Siswa</a></li>

      </ul>
    </nav>
  </div>
</aside>
