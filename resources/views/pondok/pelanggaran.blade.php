@extends('layouts.app')
@section('title', 'Pelanggaran Santri Asrama — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Pelanggaran Pondok')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Pelanggaran Santri Asrama</h1><p class="text-muted small mb-0">Tandai <code>followup_pondok → completed</code> setelah pembinaan tuntas (Task 2.11).</p></div>
  <span class="badge text-bg-warning text-dark ms-auto">2 perlu tindakan</span>
</div></div>
@foreach ($rows as $r)
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <div class="d-flex flex-wrap gap-2 align-items-center mb-1">
    <h2 class="h6 fw-bold mb-0">{{ $r['santri'] }}</h2>
    <span class="badge text-bg-info ms-auto">{{ $r['label'] }}</span>
  </div>
  <p class="small text-muted mb-1">{{ $r['tanggal'] }} • {{ $r['kategori'] }}</p>
  <p class="small mb-2"><strong>Tindak lanjut asrama:</strong> {{ $r['tindak'] }}</p>
  <button class="btn btn-success btn-sm">Tandai Selesai (Demo)</button>
</div></div>
@endforeach
@endsection
