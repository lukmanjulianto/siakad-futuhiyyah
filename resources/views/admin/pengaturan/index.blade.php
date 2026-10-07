@extends('layouts.app')
@section('title', 'Pengaturan Sistem — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Pengaturan')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-1">Pengaturan Sistem</h1>
  <p class="text-muted small mb-0">Tahun ajaran aktif & profil madrasah • tersimpan ke <code>.env</code>/database di Task 2.1.</p>
</div></div>
<div class="row g-3">
  <div class="col-lg-6"><div class="card shadow-sm h-100"><div class="card-body p-4">
    <h2 class="h6 fw-bold mb-3"><i class="bi bi-calendar3 me-2 text-futuhiyyah"></i>Tahun Ajaran Aktif</h2>
    <div class="mb-2"><label class="form-label small fw-bold">Tahun ajaran</label><select class="form-select"><option>2025/2026 Ganjil (aktif)</option><option>2024/2025 Genap</option><option>2024/2025 Ganjil</option></select></div>
    <div class="row g-2">
      <div class="col-6"><label class="form-label small fw-bold">Mulai</label><input type="date" class="form-control" value="2025-07-14"></div>
      <div class="col-6"><label class="form-label small fw-bold">Selesai</label><input type="date" class="form-control" value="2025-12-20"></div>
    </div>
    <button class="btn btn-success btn-sm mt-3">Aktifkan (Demo)</button>
  </div></div></div>
  <div class="col-lg-6"><div class="card shadow-sm h-100"><div class="card-body p-4">
    <h2 class="h6 fw-bold mb-3"><i class="bi bi-building me-2 text-futuhiyyah"></i>Profil Madrasah</h2>
    <div class="mb-2"><label class="form-label small fw-bold">Nama</label><input class="form-control" value="MTs Futuhiyyah"></div>
    <div class="mb-2"><label class="form-label small fw-bold">Alamat</label><input class="form-control" value="Jl. Pesantren Futuhiyyah, Kab. Pekalongan, Jawa Tengah"></div>
    <div class="row g-2">
      <div class="col-6"><label class="form-label small fw-bold">Telepon</label><input class="form-control" value="(0285) 000-000"></div>
      <div class="col-6"><label class="form-label small fw-bold">Email</label><input class="form-control" value="info@mtsfutuhiyyah.sch.id"></div>
    </div>
    <div class="mt-2"><label class="form-label small fw-bold">Kepala madrasah</label><input class="form-control" value="Ustadz Abdul Halim, M.Pd"></div>
    <div class="mt-2"><label class="form-label small fw-bold">Logo (png/jpg, 2MB)</label><input type="file" class="form-control" accept=".png,.jpg,.jpeg"></div>
    <button class="btn btn-success btn-sm mt-3">Simpan Profil (Demo)</button>
  </div></div></div>
</div>
@endsection
