@extends('layouts.auth')
@section('title', 'Cek Layout Auth — SIAKAD Futuhiyyah')
@section('content')
<h5 class="fw-bold mb-1">Masuk ke SIAKAD</h5>
<p class="text-muted small">Verifikasi Task 1.1: card terpusat + pola islami.</p>
<a href="#" class="btn btn-outline-futuhiyyah w-100 mb-2"><i class="bi bi-google me-2"></i>Masuk dengan Google</a>
<form>
  <div class="mb-2"><input class="form-control" type="email" placeholder="Email madrasah"></div>
  <div class="mb-3"><input class="form-control" type="password" placeholder="Kata sandi (min. 8 karakter)"></div>
  <button class="btn btn-success w-100" type="button">Masuk</button>
</form>
@endsection
