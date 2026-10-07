{{-- Layout Dashboard: AdminLTE 4 + sidebar role-aware (PRD Bab 7) --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') — SIAKAD Futuhiyyah</title>
  @vite(['resources/css/app.css', 'resources/css/futuhiyyah.css', 'resources/js/app.js'])
  @stack('styles')
</head>
<body class="layout-fixed-complete sidebar-expand-lg sidebar-mini">
<div class="app-wrapper">

  {{-- Topbar --}}
  <nav class="app-header navbar navbar-expand bg-white shadow-sm">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list fs-5"></i></a>
        </li>
        <li class="nav-item d-none d-md-block">
          <span class="nav-link text-muted small">@yield('breadcrumb', 'Dashboard') — Tahun Ajaran 2025/2026 Ganjil</span>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto align-items-center gap-2">
        <li class="nav-item">
          <a href="#" class="nav-link position-relative"><i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
            <span class="bg-futuhiyyah text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:34px;height:34px;"><i class="bi bi-person-fill"></i></span>
            <span class="d-none d-md-block small fw-bold">{{ $userName ?? 'Administrator' }}<br><span class="text-muted fw-normal">{{ $userRole ?? 'Admin' }}</span></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  {{-- Sidebar --}}
  <aside class="app-sidebar sidebar-futuhiyyah shadow" data-bs-theme="dark">
    <div class="sidebar-brand p-3 d-flex align-items-center gap-2 text-white">
      <span class="bg-white text-futuhiyyah rounded-2 d-inline-flex align-items-center justify-content-center" style="width:36px;height:36px;"><i class="bi bi-moon-stars-fill"></i></span>
      <span class="fw-bold">SIAKAD <span class="text-gold">Futuhiyyah</span></span>
    </div>
    <div class="sidebar-wrapper">
      <nav class="mt-2 px-2">
        <ul class="nav nav-pills flex-column gap-1" data-lte-toggle="treeview" role="menu">
          <li class="nav-header text-white-50 small">MENU UTAMA</li>
          <li class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>

          <li class="nav-header text-white-50 small">ADMIN</li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people me-2"></i>Data Siswa</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-arrow-left-right me-2"></i>Mutasi</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-badge me-2"></i>GTK</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-mortarboard me-2"></i>Akademik</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-exclamation-triangle me-2"></i>Pelanggaran</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-calendar-check me-2"></i>Absensi</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-file-earmark-bar-graph me-2"></i>Laporan</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-people-fill me-2"></i>Users & Pondok</a></li>

          <li class="nav-header text-white-50 small">KEPALA MADRASAH</li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-graph-up me-2"></i>Eksekutif</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-eye me-2"></i>Monitoring</a></li>

          <li class="nav-header text-white-50 small">GURU BK</li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-shield-check me-2"></i>Validasi</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-chat-heart me-2"></i>Konseling</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-award me-2"></i>Prestasi</a></li>

          <li class="nav-header text-white-50 small">PONDOK & GURU</li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-house-heart me-2"></i>Pondok</a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-journal-text me-2"></i>Jurnal Mengajar</a></li>
        </ul>
      </nav>
    </div>
  </aside>

  {{-- Content --}}
  <main class="app-main p-3">
    <div class="container-fluid fade-slide-in">
      @yield('content')
    </div>
  </main>

  <footer class="app-footer text-center small text-muted py-3">
    &copy; {{ date('Y') }} SIAKAD Futuhiyyah — MTs Futuhiyyah. Dibangun dengan Laravel 12 + AdminLTE 4.
  </footer>
</div>
@stack('scripts')
</body>
</html>
