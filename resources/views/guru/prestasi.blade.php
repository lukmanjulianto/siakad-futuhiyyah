@extends('layouts.app')
@section('title', 'Input Prestasi Guru — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Input Prestasi')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-1">Input Prestasi Santri</h1>
  <p class="text-muted small mb-0">Wajib bukti maks 2MB • tampil publik setelah verifikasi BK.</p>
</div></div>
<div class="card shadow-sm"><div class="card-body p-4">
  <div class="row g-2">
    <div class="col-md-4"><label class="form-label small fw-bold">Santri</label><input class="form-control" value="Ahmad Zaky Mubarok • VII-A"></div>
    <div class="col-md-4"><label class="form-label small fw-bold">Nama prestasi</label><input class="form-control" value="Juara 2 MHQ Tingkat KKM"></div>
    <div class="col-md-4"><label class="form-label small fw-bold">Tingkat</label><select class="form-select"><option>Madrasah</option><option>KKM</option><option>Wilayah</option></select></div>
    <div class="col-md-6"><label class="form-label small fw-bold">Penyelenggara</label><input class="form-control" value="KKM MTs Pekalongan Barat"></div>
    <div class="col-md-6"><label class="form-label small fw-bold">Bukti (sertifikat/foto)</label><input type="file" class="form-control"></div>
  </div>
  <button class="btn btn-success mt-3">Kirim untuk Verifikasi BK (Demo)</button>
</div></div>
@endsection
