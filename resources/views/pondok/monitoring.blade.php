@extends('layouts.app')
@section('title', 'Monitoring Pondok — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Monitoring')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-0">Monitoring Absensi & Jurnal Santri Pondok</h1>
  <p class="text-muted small mb-0">Hanya lihat (read-only) data madrasah + pantau kegiatan asrama.</p>
</div></div>
<div class="row g-3">
  @foreach ($rows as $r)
    <div class="col-md-6"><div class="card card-hover shadow-sm h-100"><div class="card-body">
      <h2 class="h6 fw-bold">{{ $r['aspek'] }}</h2>
      <p class="h4 fw-bold text-futuhiyyah mb-1">{{ $r['nilai'] }}</p>
      <p class="small text-muted mb-0">{{ $r['ket'] }}</p>
    </div></div></div>
  @endforeach
</div>
@endsection
