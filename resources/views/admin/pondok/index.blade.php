@extends('layouts.app')
@section('title', 'Data Pondok — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Pondok')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Pondok Futuhiyyah Putra & Putri</h1><p class="text-muted small mb-0">186 santri mondok • CRUD pondok + pengurus (user terkait di Task 2.4).</p></div>
  <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Tambah Pengurus (Demo)</button>
</div></div>
<div class="row g-3 mb-3">
  @foreach ($pondoks as $p)
    <div class="col-md-6"><div class="card card-hover shadow-sm h-100"><div class="card-body p-4">
      <span class="badge text-bg-success mb-2">{{ $p['gender'] }}</span>
      <h2 class="h6 fw-bold mb-1">{{ $p['nama'] }}</h2>
      <p class="small text-muted mb-1">Pengasuh: {{ $p['pengasuh'] }}</p>
      <p class="small text-muted mb-2">{{ $p['alamat'] }}</p>
      <p class="h4 fw-bold text-futuhiyyah mb-0">{{ $p['santri'] }} <span class="small text-muted fw-normal">santri</span></p>
    </div></div></div>
  @endforeach
</div>
<div class="card shadow-sm"><div class="card-body p-3">
  <h2 class="h6 fw-bold mb-3"><i class="bi bi-people me-2 text-futuhiyyah"></i>Pengurus Pondok</h2>
  <div class="table-responsive"><table id="tabelPengurus" class="table table-hover small align-middle w-100">
    <thead class="table-light"><tr><th>Nama</th><th>Pondok</th><th>Jabatan</th><th>HP</th><th>Status</th></tr></thead>
    <tbody>
      @foreach ($pengurus as $p)
        <tr><td class="fw-bold">{{ $p['nama'] }}</td><td>{{ $p['pondok'] }}</td><td>{{ $p['jabatan'] }}</td><td>{{ $p['hp'] }}</td><td><span class="badge text-bg-{{ $p['status'] === 'aktif' ? 'success' : 'secondary' }}">{{ $p['status'] }}</span></td></tr>
      @endforeach
    </tbody>
  </table></div>
</div></div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelPengurus', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
