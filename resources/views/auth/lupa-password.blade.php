@extends('layouts.auth')
@section('title', 'Lupa Kata Sandi — SIAKAD Futuhiyyah')
@section('content')
<h5 class="fw-bold mb-1">Lupa Kata Sandi?</h5>
<p class="text-muted small mb-3">Tenang, Ustadz/Ustadzah. Masukkan email madrasah Anda, kami kirim tautan atur ulang (demo Fase 1 — pengiriman email aktif di Task 2.3).</p>

<form onsubmit="return false;">
  @csrf
  <div class="mb-3">
    <label class="form-label fw-bold small" for="email">Email Madrasah</label>
    <input type="email" id="email" class="form-control" value="fauzan@mtsfutuhiyyah.sch.id" placeholder="nama@mtsfutuhiyyah.sch.id" required>
  </div>
  <a href="{{ route('login') }}" class="btn btn-success w-100"><i class="bi bi-envelope-paper me-2"></i>Kirim Tautan Atur Ulang</a>
</form>

<div class="alert alert-light border small mt-3 mb-0">
  <i class="bi bi-info-circle me-1"></i>Belum menerima email? Periksa folder spam atau hubungi operator di <strong>(0285) 000-000</strong>.
</div>

<p class="small text-center mt-3 mb-0"><a href="{{ route('login') }}" class="text-decoration-none"><i class="bi bi-arrow-left me-1"></i>Kembali masuk</a></p>
@endsection
