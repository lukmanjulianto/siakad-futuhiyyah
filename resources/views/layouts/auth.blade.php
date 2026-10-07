<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Masuk — SIAKAD Futuhiyyah')</title>
  <meta name="description" content="Masuk ke SIAKAD Futuhiyyah dengan Google atau email madrasah Anda.">
  @vite(['resources/css/app.css', 'resources/css/futuhiyyah.css', 'resources/js/app.js'])
  @stack('styles')
</head>
<body class="auth-islamic-bg min-vh-100 d-flex align-items-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="text-center mb-3">
          <span class="bg-white rounded-3 d-inline-flex align-items-center justify-content-center shadow" style="width:56px;height:56px;">
            <i class="bi bi-moon-stars-fill fs-3 text-futuhiyyah"></i>
          </span>
          <h4 class="text-white fw-bold mt-2 mb-0">SIAKAD <span class="text-gold">Futuhiyyah</span></h4>
          <p class="text-white-50 small mb-0">Assalamu'alaikum, silakan masuk untuk mengelola data akademik.</p>
        </div>
        <div class="card shadow border-0 rounded-3 fade-slide-in">
          <div class="card-body p-4">
            @yield('content')
          </div>
        </div>
        <p class="text-center small text-white-50 mt-3 mb-0">
          Akun baru via Google otomatis berrole Guru Mapel (Pending) & menunggu verifikasi Admin.
        </p>
      </div>
    </div>
  </div>
  @stack('scripts')
</body>
</html>
