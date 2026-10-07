@extends('layouts.app')
@section('title', 'Manajemen Kelas — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Kelas')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Manajemen Kelas</h1>
      <p class="text-muted small mb-0">9 kelas VII-A s.d. IX-C • wali kelas + kapasitas • CRUD penuh di Task 2.8.</p>
    </div>
    <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Tambah Kelas (Demo)</button>
  </div>
</div>
<div class="row g-3">
  @foreach ($rows as $k)
    <div class="col-md-4">
      <div class="card card-hover shadow-sm h-100">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <span class="bg-futuhiyyah text-white rounded-2 d-inline-flex align-items-center justify-content-center fw-bold" style="width:44px;height:44px;">{{ $k['nama'] }}</span>
            <div class="ms-2"><p class="fw-bold mb-0">Kelas {{ $k['nama'] }}</p><p class="small text-muted mb-0">Tingkat {{ $k['tingkat'] }}</p></div>
            <span class="badge text-bg-success ms-auto">{{ $k['terisi'] }}/{{ $k['kapasitas'] }}</span>
          </div>
          <p class="small mb-1"><i class="bi bi-person me-1"></i>Wali: {{ $k['wali'] }}</p>
          <div class="progress mb-2" style="height:6px;"><div class="progress-bar bg-success" style="width:{{ round($k['terisi'] / $k['kapasitas'] * 100) }}%"></div></div>
          <div class="d-flex gap-1"><button class="btn btn-sm btn-outline-futuhiyyah">Ubah</button><button class="btn btn-sm btn-outline-secondary">Rombel</button></div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
