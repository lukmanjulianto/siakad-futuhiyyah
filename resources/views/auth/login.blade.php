@extends('layouts.auth')
@section('title', 'Masuk — SIAKAD Futuhiyyah')
@section('content')
<h5 class="fw-bold mb-1">Masuk ke SIAKAD</h5>
<p class="text-muted small mb-3">Gunakan akun Google madrasah atau email & kata sandi Anda.</p>

<a href="{{ route('oauth.google.redirect') }}" class="btn btn-outline-futuhiyyah w-100 mb-2">
  <i class="bi bi-google me-2"></i>Masuk dengan Google
</a>
<p class="small text-muted text-center mb-3">Khusus email <code>@mtsfutuhiyyah.sch.id</code> • akun baru otomatis Guru Mapel (Pending)</p>

<div class="d-flex align-items-center gap-2 mb-3">
  <hr class="flex-grow-1"><span class="small text-muted">atau</span><hr class="flex-grow-1">
</div>

<form method="POST" action="{{ route('admin.dashboard') }}" onsubmit="return false;">
  @csrf
  <div class="mb-2">
    <label class="form-label fw-bold small" for="email">Email</label>
    <input type="email" id="email" class="form-control" value="admin@mtsfutuhiyyah.sch.id" placeholder="nama@mtsfutuhiyyah.sch.id" required>
  </div>
  <div class="mb-2">
    <label class="form-label fw-bold small" for="password">Kata Sandi <span class="text-muted fw-normal">(min. 8 karakter, huruf + angka)</span></label>
    <div class="input-group">
      <input type="password" id="password" class="form-control" value="Futuhiyyah123" minlength="8" required>
      <button class="btn btn-outline-secondary" type="button" onclick="const i=document.getElementById('password');i.type=i.type==='password'?'text':'password';" aria-label="Tampilkan sandi"><i class="bi bi-eye"></i></button>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="remember" checked>
      <label class="form-check-label small" for="remember">Ingat saya</label>
    </div>
    <a href="{{ route('password.forgot') }}" class="small text-decoration-none">Lupa kata sandi?</a>
  </div>
  <a href="{{ route('admin.dashboard') }}" class="btn btn-success w-100"><i class="bi bi-box-arrow-in-right me-2"></i>Masuk (Demo Fase 1)</a>
</form>

<div class="alert alert-light border small mt-3 mb-0">
  <p class="fw-bold mb-1"><i class="bi bi-people me-1"></i>Akun demo Fase 1 (klik untuk pratinjau peran):</p>
  <div class="d-flex flex-wrap gap-1">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-futuhiyyah">Admin</a>
    <a href="{{ route('kepala.dashboard') }}" class="btn btn-sm btn-outline-futuhiyyah">Kepala</a>
    <a href="{{ route('bk.dashboard') }}" class="btn btn-sm btn-outline-futuhiyyah">Guru BK</a>
    <a href="{{ route('pondok.dashboard') }}" class="btn btn-sm btn-outline-futuhiyyah">Pondok</a>
    <a href="{{ route('guru.dashboard') }}" class="btn btn-sm btn-outline-futuhiyyah">Guru Mapel</a>
  </div>
  <p class="mb-0 mt-2 text-muted">Backend login & sesi 8 jam menyusul di Task 2.3.</p>
</div>

<p class="small text-center mt-3 mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar di sini</a></p>
@endsection
