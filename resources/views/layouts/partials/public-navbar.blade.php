{{-- Navbar publik persisten: Beranda, Cek Data Siswa, Tentang, Login (PRD Bab 7) --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-futuhiyyah-dark shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('public.home') }}">
      <span class="bg-white text-futuhiyyah rounded-2 d-inline-flex align-items-center justify-content-center" style="width:38px;height:38px;">
        <i class="bi bi-moon-stars-fill fs-5"></i>
      </span>
      <span class="fw-bold" style="font-family:var(--futuhiyyah-font-heading)">SIAKAD <span class="text-gold">Futuhiyyah</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNav" aria-controls="publicNav" aria-expanded="false" aria-label="Navigasi">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="publicNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('public.home') ? 'active fw-bold' : '' }}" href="{{ route('public.home') }}">
            <i class="bi bi-house-door me-1"></i>Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('public.cek-siswa*') ? 'active fw-bold' : '' }}" href="{{ route('public.cek-siswa') }}">
            <i class="bi bi-person-search me-1"></i>Cek Data Siswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('public.tentang') ? 'active fw-bold' : '' }}" href="{{ route('public.tentang') }}">
            <i class="bi bi-info-circle me-1"></i>Tentang
          </a>
        </li>
        <li class="nav-item ms-lg-2">
          <a class="btn btn-warning btn-sm rounded-2 fw-bold" href="{{ route('login') }}">
            <i class="bi bi-box-arrow-in-right me-1"></i>Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
