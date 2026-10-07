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
  @include('layouts.partials.public-navbar')

  <main class="fade-slide-in">
    @yield('content')
  </main>

  @include('layouts.partials.public-footer')

  @stack('scripts')
</body>
</html>
