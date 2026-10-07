@extends('layouts.auth')
@section('title', 'Daftar — SIAKAD Futuhiyyah')
@section('content')
<h5 class="fw-bold mb-1">Daftar Akun Pengelola</h5>
<p class="text-muted small mb-3">Khusus guru & pengurus MTs Futuhiyyah. Akun baru otomatis berrole <strong>Guru Mapel (Pending)</strong> dan menunggu verifikasi Admin di <code>/admin/users</code>.</p>

<a href="{{ route('oauth.google.redirect') }}" class="btn btn-success w-100 mb-2">
  <i class="bi bi-google me-2"></i>Daftar dengan Google
</a>
<p class="small text-muted text-center mb-3">Wajib memakai email <code>@mtsfutuhiyyah.sch.id</code> • domain lain ditolak sistem (Task 2.3)</p>

<div class="d-flex align-items-center gap-2 mb-3">
  <hr class="flex-grow-1"><span class="small text-muted">atau email</span><hr class="flex-grow-1">
</div>

<form onsubmit="return false;">
  @csrf
  <div class="mb-2">
    <label class="form-label fw-bold small" for="name">Nama Lengkap</label>
    <input type="text" id="name" class="form-control" value="Ustadz Muhammad Fauzan" placeholder="cth. Ustadz Muhammad Fauzan" required>
  </div>
  <div class="mb-2">
    <label class="form-label fw-bold small" for="email">Email Madrasah</label>
    <input type="email" id="email" class="form-control" value="fauzan@mtsfutuhiyyah.sch.id" placeholder="nama@mtsfutuhiyyah.sch.id" required>
  </div>
  <div class="row g-2">
    <div class="col-md-6">
      <label class="form-label fw-bold small" for="pw1">Kata Sandi</label>
      <input type="password" id="pw1" class="form-control" value="Futuhiyyah123" minlength="8" required>
    </div>
    <div class="col-md-6">
      <label class="form-label fw-bold small" for="pw2">Ulangi Sandi</label>
      <input type="password" id="pw2" class="form-control" value="Futuhiyyah123" minlength="8" required>
    </div>
  </div>
  <p class="small text-muted mt-1 mb-3">Minimal 8 karakter, kombinasi huruf & angka.</p>
  <a href="{{ route('login') }}" class="btn btn-success w-100"><i class="bi bi-person-plus me-2"></i>Ajukan Akun (Demo Fase 1)</a>
</form>

<p class="small text-center mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold">Masuk</a></p>
@endsection
