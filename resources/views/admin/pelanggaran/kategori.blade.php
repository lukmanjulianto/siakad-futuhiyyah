@extends('layouts.app')
@section('title', 'Kategori Pelanggaran — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Kategori Pelanggaran')
@section('content')
@php
  $levelBadge = ['ringan' => 'info', 'sedang' => 'warning', 'berat' => 'danger'];
@endphp
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Kategori Pelanggaran</h1>
      <p class="text-muted small mb-0">Setiap kategori punya poin otomatis • Ringan 1–10 • Sedang 11–30 • Berat &gt;30.</p>
    </div>
    <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#modalKategori"><i class="bi bi-plus me-1"></i>Tambah Kategori (Demo)</button>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelKategori" class="table table-hover small align-middle w-100">
        <thead class="table-light"><tr><th>No</th><th>Nama</th><th>Level</th><th>Poin</th><th>Sanksi</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
          @foreach ($rows as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td class="fw-bold">{{ $r['nama'] }}</td>
              <td><span class="badge text-bg-{{ $levelBadge[$r['level']] }} text-capitalize">{{ $r['level'] }}</span></td>
              <td class="fw-bold">{{ $r['poin'] }}</td>
              <td>{{ $r['sanksi'] }}</td>
              <td class="text-end text-nowrap"><button class="btn btn-sm btn-outline-futuhiyyah">Ubah</button> <button class="btn btn-sm btn-outline-danger">Hapus</button></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modalKategori" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content rounded-3">
      <div class="modal-header"><h2 class="h6 fw-bold mb-0">Tambah Kategori (Demo Fase 1)</h2><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="mb-2"><label class="form-label small fw-bold">Nama pelanggaran</label><input class="form-control" value="Membawa HP tanpa izin"></div>
        <div class="row g-2">
          <div class="col-6"><label class="form-label small fw-bold">Level</label><select class="form-select"><option>ringan</option><option>sedang</option><option>berat</option></select></div>
          <div class="col-6"><label class="form-label small fw-bold">Poin</label><input type="number" class="form-control" value="10"></div>
        </div>
        <div class="mt-2"><label class="form-label small fw-bold">Sanksi</label><textarea class="form-control" rows="2">Teguran + HP dititipkan wali kelas 1 hari</textarea></div>
      </div>
      <div class="modal-footer"><button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button><button class="btn btn-success btn-sm" data-bs-dismiss="modal">Simpan</button></div>
    </div>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelKategori', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
