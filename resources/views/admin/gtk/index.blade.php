@extends('layouts.app')
@section('title', 'Kelola GTK — SIAKAD Futuhiyyah')
@section('breadcrumb', 'GTK')
@section('content')
@php
  $badge = ['aktif' => 'success', 'mutasi_masuk' => 'info', 'nonaktif' => 'secondary', 'cuti' => 'warning'];
@endphp
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Guru & Tenaga Kependidikan</h1>
      <p class="text-muted small mb-0">{{ count($rows) }} ditampilkan (dummy Fase 1) • filter status/jenis/nama • NIK 16 digit unik.</p>
    </div>
    <div class="ms-auto d-flex flex-wrap gap-2">
      <a href="#" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-upload me-1"></i>Import</a>
      <a href="#" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-file-earmark-excel me-1"></i>Excel</a>
      <a href="{{ route('admin.gtk.create') }}" class="btn btn-success btn-sm"><i class="bi bi-person-plus me-1"></i>Tambah GTK</a>
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
        <select name="ptk" class="form-select tom-select" onchange="this.form.submit()">
          <option value="">Guru + Tendik</option>
          @foreach ($ptkOptions as $k => $v)
            <option value="{{ $k }}" {{ ($filters['ptk'] ?? '') === $k ? 'selected' : '' }}>{{ $v }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <div class="input-group">
          <input type="search" name="q" class="form-control" placeholder="Cari nama / NIK / mapel…" value="{{ $filters['q'] ?? '' }}">
          <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
          @if (! empty(array_filter($filters ?? [])))
            <a href="{{ route('admin.gtk.index') }}" class="btn btn-outline-secondary">Reset</a>
          @endif
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelGtk" class="table table-hover align-middle small w-100">
        <thead class="table-light"><tr><th>No</th><th>Nama / NIK</th><th>Mapel / Tugas</th><th>Jenis</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
          @foreach ($rows as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td><span class="fw-bold">{{ $r['name'] }}</span><br><span class="text-muted">{{ $r['nik'] }} • {{ $r['phone'] }}</span></td>
              <td>{{ $r['mapel'] }}</td>
              <td><span class="badge text-bg-{{ $r['ptk'] === 'Guru' ? 'success' : 'info' }}">{{ $r['ptk'] }}</span></td>
              <td><span class="badge text-bg-{{ $badge[$r['status']] ?? 'secondary' }}">{{ $statusOptions[$r['status']] ?? $r['status'] }}</span></td>
              <td class="text-end"><a href="{{ route('admin.gtk.edit', $r['id']) }}" class="btn btn-sm btn-outline-futuhiyyah"><i class="bi bi-pencil"></i> Ubah</a></td>
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
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelGtk', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
