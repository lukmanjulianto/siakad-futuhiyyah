@extends('layouts.app')
@section('title', 'Dashboard Pondok — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Dashboard Asrama')
@section('content')
<div class="card shadow-sm border-0 mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-0">Assalamu'alaikum, Ustadz Pengasuh!</h1>
  <p class="text-muted small mb-0">186 santri mondok terpantau • fokus pembinaan adab dan ibadah asrama.</p>
</div></div>
<div class="row g-3 mb-3">
  @foreach ($stats as $s)
    <div class="col-6 col-xl-3"><div class="card card-hover shadow-sm h-100"><div class="card-body d-flex gap-3 align-items-center">
      <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center" style="width:46px;height:46px;"><i class="bi {{ $s['icon'] }} fs-5"></i></span>
      <div><h3 class="fw-bold mb-0">{{ $s['value'] }}</h3><p class="small text-muted mb-0">{{ $s['label'] }}</p></div>
    </div></div></div>
  @endforeach
</div>
<div class="card shadow-sm"><div class="card-body p-4">
  <h2 class="h6 fw-bold mb-3"><i class="bi bi-exclamation-triangle me-2 text-warning"></i>Perlu Tindak Lanjut Asrama</h2>
  <div class="table-responsive"><table class="table table-sm small align-middle mb-0">
    <thead class="table-light"><tr><th>Tanggal</th><th>Santri</th><th>Status</th></tr></thead>
    <tbody>@foreach ($pelanggaran as $p)<tr><td>{{ $p['tanggal'] }}</td><td>{{ $p['santri'] }}</td><td>{{ $p['label'] }}</td></tr>@endforeach</tbody>
  </table></div>
  <a href="{{ route('pondok.pelanggaran') }}" class="btn btn-success btn-sm mt-3">Tindak Lanjuti<i class="bi bi-arrow-right ms-1"></i></a>
</div></div>
@endsection
