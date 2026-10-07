@extends('layouts.app')
@section('title', 'Prestasi BK — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Prestasi')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Verifikasi Prestasi</h1><p class="text-muted small mb-0">Wajib bukti maks 2MB • <code>pending → verified</code> tampil ke publik.</p></div>
  <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Input Prestasi (Demo)</button>
</div></div>
<div class="card shadow-sm"><div class="card-body p-3"><div class="table-responsive">
  <table id="tabelBkPrestasi" class="table table-hover small align-middle w-100">
    <thead class="table-light"><tr><th>Tanggal</th><th>Prestasi</th><th>Santri</th><th>Tingkat</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
    <tbody>
      @foreach ($rows as $p)
        <tr>
          <td>{{ $p['tanggal'] }}</td><td class="fw-bold">{{ $p['nama'] }}</td><td>{{ $p['santri'] }}</td>
          <td><span class="badge text-bg-warning text-dark">{{ $p['tingkat'] }}</span></td>
          <td><span class="badge text-bg-{{ $p['status'] === 'verified' ? 'success' : 'warning' }}">{{ $p['status'] }}</span></td>
          <td class="text-end"><button class="btn btn-sm btn-success">Verifikasi</button></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div></div></div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelBkPrestasi', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
