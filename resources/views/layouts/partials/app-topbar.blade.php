{{-- Topbar dashboard: toggle sidebar, tahun ajaran, notifikasi, user + ganti peran (demo Fase 1) --}}
@php
  $activeRole = $activeRole ?? request()->segment(1) ?: 'admin';
  $roleLabels = ['admin' => 'Admin', 'kepala' => 'Kepala Madrasah', 'bk' => 'Guru BK', 'pondok' => 'Pengurus Pondok', 'guru' => 'Guru Mapel'];
  $roleLabel = $roleLabels[$activeRole] ?? 'Admin';
  $userName = $userName ?? 'Administrator';
  $notifCount = $notifCount ?? 3;
@endphp
<nav class="app-header navbar navbar-expand bg-white shadow-sm">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Sidebar"><i class="bi bi-list fs-5"></i></a>
      </li>
      <li class="nav-item d-none d-md-flex align-items-center">
        <span class="badge text-bg-success rounded-2"><i class="bi bi-calendar3 me-1"></i>TA 2025/2026 Ganjil</span>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto align-items-center gap-1">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link position-relative" data-bs-toggle="dropdown" aria-label="Notifikasi">
          <i class="bi bi-bell fs-5"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $notifCount }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow">
          <li><h6 class="dropdown-header">Notifikasi (contoh)</h6></li>
          <li><a class="dropdown-item small" href="#"><i class="bi bi-exclamation-triangle text-warning me-2"></i>2 pelanggaran menunggu verifikasi BK</a></li>
          <li><a class="dropdown-item small" href="#"><i class="bi bi-calendar-x text-danger me-2"></i>5 santri alpha pekan ini</a></li>
          <li><a class="dropdown-item small" href="#"><i class="bi bi-award text-warning me-2"></i>1 prestasi menunggu verifikasi</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
          <span class="bg-futuhiyyah text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:34px;height:34px;"><i class="bi bi-person-fill"></i></span>
          <span class="d-none d-md-block small fw-bold lh-1">{{ $userName }}<br>
            <span class="badge text-bg-success mt-1">{{ $roleLabel }}</span>
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow">
          <li><h6 class="dropdown-header">Pratinjau peran (Fase 1)</h6></li>
          @foreach ($roleLabels as $key => $label)
            <li>
              <a class="dropdown-item small {{ $activeRole === $key ? 'active' : '' }}" href="{{ url('/' . $key . '/dashboard') }}">
                <i class="bi bi-person-badge me-2"></i>{{ $label }}
              </a>
            </li>
          @endforeach
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
          <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
