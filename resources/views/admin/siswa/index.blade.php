@extends('layouts.app')
@section('title', 'Kelola Data Siswa — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Data Siswa')
@section('content')
@php
  $badge = ['aktif' => 'success', 'aktif_mutasi_masuk' => 'info', 'mutasi_keluar' => 'warning', 'lulus' => 'secondary', 'nonaktif' => 'secondary'];
@endphp
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Kelola Data Siswa</h1>
      <p class="text-muted small mb-0">Cari < 3 detik • {{ count($rows) }} ditampilkan (dummy Fase 1) • DataTables + filter status/kelas/nama.</p>
    </div>
    <div class="ms-auto d-flex flex-wrap gap-2">
      <a href="#" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-download me-1"></i>Template</a>
      <a href="#" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-upload me-1"></i>Import</a>
      <a href="#" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-file-earmark-excel me-1"></i>Excel</a>
      <a href="{{ route('admin.siswa.create') }}" class="btn btn-success btn-sm"><i class="bi bi-person-plus me-1"></i>Tambah Siswa</a>
    </div>
  </div>
</div>

<div class="card shadow-sm mb-3">
  <div class="card-body p-3">
    <form method="GET" class="row g-2">
      <div class="col-md-3">
        <select name="status" class="form-select tom-select" onchange="this.form.submit()">
          <option value="">Semua status</option>
          @foreach ($statusOptions as $k => $v)
            <option value="{{ $k }}" {{ ($filters['status'] ?? '') === $k ? 'selected' : '' }}>{{ $v }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        <select name="kelas" class="form-select tom-select" onchange="this.form.submit()">
          <option value="">Semua kelas</option>
          @foreach ($kelasOptions as $k)
            <option {{ ($filters['kelas'] ?? '') === $k ? 'selected' : '' }}>{{ $k }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="search" name="q" class="form-control" placeholder="Cari nama / NISN / NIS lokal…" value="{{ $filters['q'] ?? '' }}">
          <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
          @if (! empty(array_filter($filters ?? [])))
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-outline-secondary">Reset</a>
          @endif
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelSiswa" class="table table-hover align-middle small w-100">
        <thead class="table-light"><tr><th>No</th><th>Nama / NISN / NIS</th><th>Kelas</th><th>Pondok</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
          @foreach ($rows as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td><span class="fw-bold">{{ $r['name'] }}</span><br><span class="text-muted">{{ $r['nisn'] }} • {{ $r['nis'] }} • Ibu: {{ $r['ibu'] }}</span></td>
              <td><span class="badge text-bg-success">{{ $r['kelas'] }}</span></td>
              <td>{{ $r['pondok'] }}</td>
              <td><span class="badge text-bg-{{ $badge[$r['status']] ?? 'secondary' }}">{{ $statusOptions[$r['status']] ?? $r['status'] }}</span></td>
              <td class="text-end text-nowrap">
                <a href="{{ route('admin.siswa.edit', $r['id']) }}" class="btn btn-sm btn-outline-futuhiyyah"><i class="bi bi-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="small text-muted mb-0 mt-2"><i class="bi bi-info-circle me-1"></i>Server-side DataTables + import/export Excel aktif di Task 2.6. Tombol Import/Excel/Template saat ini demo UI.</p>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) {
    new DataTable('#tabelSiswa', { pageLength: 10, language: { search: 'Cari tabel:', lengthMenu: 'Tampil _MENU_' } });
  }
});
</script>
@endpush
@endsection
