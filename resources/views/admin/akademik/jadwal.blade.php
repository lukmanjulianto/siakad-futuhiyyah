@extends('layouts.app')
@section('title', 'Template Jadwal — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Jadwal')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div><h1 class="h5 fw-bold mb-0">Template Jadwal</h1><p class="text-muted small mb-0">Hanya <strong>satu template aktif</strong> • hapus hanya bila nonaktif • Jumat libur.</p></div>
    <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Buat Template (Demo)</button>
  </div>
</div>
<div class="row g-3">
  @foreach ($rows as $t)
    <div class="col-md-4">
      <div class="card card-hover shadow-sm h-100 {{ $t['aktif'] ? 'border-success' : '' }}">
        <div class="card-body">
          <span class="badge text-bg-{{ $t['aktif'] ? 'success' : 'secondary' }} mb-2">{{ $t['aktif'] ? 'AKTIF' : 'Nonaktif' }}</span>
          <h2 class="h6 fw-bold mb-1">{{ $t['nama'] }}</h2>
          <p class="small text-muted mb-2">{{ $t['ta'] }} • {{ $t['jumlah'] }} slot terisi</p>
          <div class="d-flex gap-1 flex-wrap">
            <a href="{{ route('admin.akademik.jadwal.setting', $t['id']) }}" class="btn btn-sm btn-success"><i class="bi bi-gear me-1"></i>Setting</a>
            @if (! $t['aktif'])
              <button class="btn btn-sm btn-outline-futuhiyyah">Aktifkan</button>
              <button class="btn btn-sm btn-outline-danger">Hapus</button>
            @else
              <button class="btn btn-sm btn-outline-secondary" disabled>Hapus (aktif)</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
