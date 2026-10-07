@extends('layouts.app')
@section('title', 'Dashboard Guru — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Jadwal Hari Ini')
@section('content')
<div class="card shadow-sm border-0 mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Assalamu'alaikum, Ustadz Fauzan!</h1><p class="text-muted small mb-0">3 jadwal hari ini • isi absensi & jurnal maksimal H+1.</p></div>
  <div class="ms-auto d-flex gap-2"><a href="{{ route('guru.absensi') }}" class="btn btn-success btn-sm"><i class="bi bi-calendar-check me-1"></i>Isi Absensi</a><a href="{{ route('guru.jurnal') }}" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-journal-text me-1"></i>Isi Jurnal</a></div>
</div></div>
<div class="row g-3">
  @foreach ($jadwal as $j)
    <div class="col-md-4"><div class="card card-hover shadow-sm h-100"><div class="card-body">
      <span class="badge text-bg-success mb-2">{{ $j['jam'] }}</span>
      <h2 class="h6 fw-bold mb-1">{{ $j['mapel'] }} • {{ $j['kelas'] }}</h2>
      <p class="small text-muted mb-2">Ruang {{ $j['ruang'] }}</p>
      <div class="d-flex gap-1"><a href="{{ route('guru.absensi') }}" class="btn btn-sm btn-outline-futuhiyyah">Absensi</a><a href="{{ route('guru.jurnal') }}" class="btn btn-sm btn-outline-secondary">Jurnal</a></div>
    </div></div></div>
  @endforeach
</div>
@endsection
