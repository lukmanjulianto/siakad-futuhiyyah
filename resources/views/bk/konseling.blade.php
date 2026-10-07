@extends('layouts.app')
@section('title', 'Konseling BK — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Konseling')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Catatan Konseling</h1><p class="text-muted small mb-0">Status: open → monitoring → closed • privasi santri dijaga.</p></div>
  <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Sesi Baru (Demo)</button>
</div></div>
<div class="row g-3">
  @foreach ($rows as $k)
    <div class="col-md-4"><div class="card card-hover shadow-sm h-100"><div class="card-body">
      <span class="badge text-bg-{{ $k['status'] === 'closed' ? 'success' : ($k['status'] === 'monitoring' ? 'warning' : 'info') }} mb-2">{{ $k['status'] }}</span>
      <h2 class="h6 fw-bold">{{ $k['santri'] }}</h2>
      <p class="small text-muted mb-1">{{ $k['tanggal'] }}</p>
      <p class="small mb-1"><strong>Topik:</strong> {{ $k['topik'] }}</p>
      <p class="small text-muted mb-0"><strong>Hasil:</strong> {{ $k['hasil'] }}</p>
    </div></div></div>
  @endforeach
</div>
@endsection
