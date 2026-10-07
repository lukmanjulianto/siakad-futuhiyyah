<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'SIAKAD Futuhiyyah — Sistem Informasi Akademik MTs Futuhiyyah')</title>
  <meta name="description" content="@yield('meta_description', 'SIAKAD Futuhiyyah: portal akademik MTs Futuhiyyah — cek data santri, absensi, pelanggaran, dan prestasi secara transparan.')">
  <meta name="keywords" content="siakad, mts futuhiyyah, pesantren, santri, cek data siswa, akademik madrasah">
  <meta property="og:title" content="@yield('og_title', 'SIAKAD Futuhiyyah')">
  <meta property="og:description" content="@yield('og_description', 'Sistem Informasi Akademik MTs Futuhiyyah — islami, modern, transparan.')">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "EducationalOrganization",
    "name": "MTs Futuhiyyah",
    "url": "{{ url('/') }}",
    "address": {
      "@@type": "PostalAddress",
      "addressLocality": "Kabupaten Pekalongan",
      "addressRegion": "Jawa Tengah",
      "addressCountry": "ID"
    }
  }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  @vite(['resources/css/app.css', 'resources/css/futuhiyyah.css', 'resources/js/app.js'])
  @stack('styles')
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-futuhiyyah-dark shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
        <span class="bg-white text-futuhiyyah rounded-2 d-inline-flex align-items-center justify-content-center" style="width:38px;height:38px;">
          <i class="bi bi-moon-stars-fill fs-5"></i>
        </span>
        <span class="fw-bold" style="font-family:var(--futuhiyyah-font-heading)">SIAKAD <span class="text-gold">Futuhiyyah</span></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="publicNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
          <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" href="{{ url('/') }}"><i class="bi bi-house-door me-1"></i>Beranda</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('cek-siswa*') ? 'active fw-bold' : '' }}" href="#"><i class="bi bi-person-search me-1"></i>Cek Data Siswa</a></li>
          <li class="nav-item"><a class="nav-link {{ request()->is('tentang') ? 'active fw-bold' : '' }}" href="#"><i class="bi bi-info-circle me-1"></i>Tentang</a></li>
          <li class="nav-item ms-lg-2"><a class="btn btn-warning btn-sm rounded-2 fw-bold" href="#"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="fade-slide-in">
    @yield('content')
  </main>

  <footer class="bg-futuhiyyah-dark text-white mt-5 pt-4 pb-3">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-5">
          <h5 class="fw-bold">MTs <span class="text-gold">Futuhiyyah</span></h5>
          <p class="text-white-50 small mb-1">Sistem Informasi Akademik terpadu: data santri, absensi, jurnal guru, pelanggaran, dan prestasi dalam satu pintu.</p>
          <p class="small mb-0"><i class="bi bi-geo-alt me-1 text-gold"></i>Jl. Pesantren Futuhiyyah, Kab. Pekalongan, Jawa Tengah</p>
        </div>
        <div class="col-md-4">
          <h6 class="fw-bold">Tautan Cepat</h6>
          <ul class="list-unstyled small">
            <li><a href="{{ url('/') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Cek Data Siswa</a></li>
            <li><a href="#" class="text-white-50 text-decoration-none">Tentang Madrasah</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold">Kontak</h6>
          <p class="small text-white-50 mb-1"><i class="bi bi-telephone me-1"></i>(0285) 000-000</p>
          <p class="small text-white-50 mb-0"><i class="bi bi-envelope me-1"></i>info@mtsfutuhiyyah.sch.id</p>
        </div>
      </div>
      <hr class="border-white-50">
      <p class="small text-white-50 text-center mb-0">&copy; {{ date('Y') }} MTs Futuhiyyah. Seluruh data dilindungi verifikasi ganda.</p>
    </div>
  </footer>

  @stack('scripts')
</body>
</html>
