@extends('layouts.app')
@section('title', 'Tindak Lanjut BK — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Tindak Lanjut')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-0">Tindak Lanjut BK</h1>
  <p class="text-muted small mb-0">Pantau progres sanksi & pembinaan hingga <code>completed</code>.</p>
</div></div>
@foreach ($rows as $r)
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
    <h2 class="h6 fw-bold mb-0">{{ $r['santri'] }}</h2>
    <span class="badge text-bg-info ms-auto">{{ $statusOptions[$r['status']] }}</span>
  </div>
  <p class="small mb-2"><strong>Sanksi:</strong> {{ $r['sanksi'] }}</p>
  <div class="progress mb-1" style="height:8px;"><div class="progress-bar bg-success" style="width:{{ $r['progres'] }}%"></div></div>
  <p class="small text-muted mb-0">{{ $r['progres'] }}% tuntas</p>
</div></div>
@endforeach
@endsection
