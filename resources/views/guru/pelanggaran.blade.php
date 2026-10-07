@extends('layouts.app')
@section('title', 'Input Pelanggaran Guru — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Input Pelanggaran')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-1">Input Pelanggaran saat KBM</h1>
  <p class="text-muted small mb-0">Hanya kategori ringan (poin otomatis) • diteruskan ke BK untuk verifikasi.</p>
</div></div>
<div class="card shadow-sm"><div class="card-body p-4">
  <div class="row g-2">
    <div class="col-md-5"><label class="form-label small fw-bold">Santri</label><select class="form-select tom-select">@foreach ($siswa as $s)<option>{{ $s['name'] }} • {{ $s['kelas'] }}</option>@endforeach</select></div>
    <div class="col-md-4"><label class="form-label small fw-bold">Kategori ringan</label><select class="form-select">@foreach ($kategori as $k)<option>{{ $k['nama'] }} ({{ $k['poin'] }})</option>@endforeach</select></div>
    <div class="col-md-3"><label class="form-label small fw-bold">Tanggal</label><input type="date" class="form-control" value="2025-10-06"></div>
    <div class="col-12"><label class="form-label small fw-bold">Keterangan</label><textarea class="form-control" rows="2">Terlambat masuk jam Fiqih ke-2 tanpa keterangan, ditegur di kelas.</textarea></div>
  </div>
  <button class="btn btn-success mt-3">Kirim ke BK (Demo)</button>
</div></div>
@endsection
