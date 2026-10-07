{{-- Layout Dashboard: AdminLTE 4 + sidebar role-aware + topbar + breadcrumb (PRD Bab 7) --}}
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

  @include('layouts.partials.app-topbar', [
    'activeRole' => $activeRole ?? request()->segment(1) ?: 'admin',
    'userName' => $userName ?? 'Administrator',
  ])

  @include('layouts.partials.app-sidebar', [
    'activeRole' => $activeRole ?? request()->segment(1) ?: 'admin',
  ])

  <main class="app-main p-3">
    <div class="container-fluid fade-slide-in">
      @include('layouts.partials.app-breadcrumb')
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
