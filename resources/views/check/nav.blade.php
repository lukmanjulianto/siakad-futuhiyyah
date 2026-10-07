@extends('layouts.public')
@section('title', $title ?? 'Pratinjau Navigasi — SIAKAD Futuhiyyah')
@section('content')
<div class="container py-5">
  <div class="card shadow-sm card-hover">
    <div class="card-body p-4">
      <span class="badge text-bg-success mb-2">Navigasi publik OK</span>
      <h1 class="h4">{{ $heading ?? 'Tautan navigasi berfungsi' }}</h1>
      <p class="text-muted">{{ $desc ?? 'Halaman penuh (Beranda / Cek Siswa / Tentang) dibangun di Task 1.3.' }}</p>
      <a href="{{ route('public.home') }}" class="btn btn-success btn-sm">Beranda</a>
      <a href="{{ route('public.cek-siswa') }}" class="btn btn-outline-futuhiyyah btn-sm ms-2">Cek Data Siswa</a>
      <a href="{{ route('public.tentang') }}" class="btn btn-outline-futuhiyyah btn-sm ms-2">Tentang</a>
    </div>
  </div>
</div>
@endsection
