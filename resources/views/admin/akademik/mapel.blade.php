@extends('layouts.app')
@section('title', 'Mata Pelajaran — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Mapel')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div><h1 class="h5 fw-bold mb-0">Mata Pelajaran</h1><p class="text-muted small mb-0">16 mapel • kode unik • kelompok agama/umum/mulok.</p></div>
    <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Tambah Mapel (Demo)</button>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelMapel" class="table table-hover small align-middle w-100">
        <thead class="table-light"><tr><th>Kode</th><th>Nama</th><th>Kelompok</th><th>Aksi</th></tr></thead>
        <tbody>
          @foreach ($rows as $m)
            <tr>
              <td><span class="badge text-bg-success">{{ $m['kode'] }}</span></td>
              <td class="fw-bold">{{ $m['nama'] }}</td>
              <td><span class="badge text-bg-{{ $m['kelompok'] === 'agama' ? 'success' : ($m['kelompok'] === 'umum' ? 'info' : 'warning') }}">{{ $m['kelompok'] }}</span></td>
              <td><button class="btn btn-sm btn-outline-futuhiyyah">Ubah</button></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelMapel', { pageLength: 16 }); }
});
</script>
@endpush
@endsection
