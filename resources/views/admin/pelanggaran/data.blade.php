@extends('layouts.app')
@section('title', 'Data Pelanggaran — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Data Pelanggaran')
@section('content')
@php
  $statusBadge = ['pending' => 'warning', 'verified_bk' => 'info', 'followup_bk' => 'primary', 'followup_pondok' => 'secondary', 'completed' => 'success'];
  $levelBadge = ['ringan' => 'info', 'sedang' => 'warning', 'berat' => 'danger'];
@endphp
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Data Pelanggaran Santri</h1>
      <p class="text-muted small mb-0">Alur: input → verifikasi BK → tindak lanjut BK → tindak lanjut pondok → selesai. Klik baris untuk detail.</p>
    </div>
    <button class="btn btn-success btn-sm ms-auto"><i class="bi bi-plus me-1"></i>Input Pelanggaran (Demo)</button>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelPelanggaran" class="table table-hover small align-middle w-100">
        <thead class="table-light"><tr><th>Tanggal</th><th>Santri</th><th>Kategori</th><th>Poin</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
        <tbody>
          @foreach ($rows as $r)
            <tr>
              <td>{{ $r['tanggal'] }}</td>
              <td><span class="fw-bold">{{ $r['santri'] }}</span><br><span class="text-muted">{{ $r['kelas'] }} • NIS {{ $r['nis'] }}</span></td>
              <td>{{ $r['kategori'] }}<br><span class="badge text-bg-{{ $levelBadge[$r['level']] }}">{{ $r['level'] }}</span></td>
              <td class="fw-bold">{{ $r['poin'] }}</td>
              <td><span class="badge text-bg-{{ $statusBadge[$r['status']] }}">{{ $statusOptions[$r['status']] }}</span></td>
              <td class="text-end"><button class="btn btn-sm btn-outline-futuhiyyah" data-bs-toggle="modal" data-bs-target="#modalAlur{{ $r['id'] }}"><i class="bi bi-diagram-3 me-1"></i>Alur</button></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@foreach ($rows as $r)
<div class="modal fade" id="modalAlur{{ $r['id'] }}" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content rounded-3">
      <div class="modal-header">
        <h2 class="h6 fw-bold mb-0">Alur Tindak Lanjut — {{ $r['santri'] }}</h2>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="small mb-1"><strong>{{ $r['kategori'] }}</strong> ({{ $r['poin'] }} poin) • {{ $r['tanggal'] }} • Pelapor: {{ $r['pelapor'] }}</p>
        <p class="small text-muted">{{ $r['keterangan'] }}</p>
        <ol class="list-group list-group-numbered small">
          @foreach ($alur as $a)
            <li class="list-group-item d-flex justify-content-between align-items-start {{ $a['key'] === $r['status'] ? 'list-group-item-success' : '' }}">
              <div><strong>{{ $a['label'] }}</strong><br><span class="text-muted">{{ $a['desc'] }}</span></div>
              @if ($a['key'] === $r['status'])
                <span class="badge text-bg-success">posisi saat ini</span>
              @endif
            </li>
          @endforeach
        </ol>
        <p class="small text-muted mt-2 mb-0"><i class="bi bi-info-circle me-1"></i>Perubahan status dicatat di activity log (Task 2.11). Tombol verifikasi/tindak lanjut aktif sesuai peran.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
        <button class="btn btn-success btn-sm" data-bs-dismiss="modal">Simpan Catatan (Demo)</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelPelanggaran', { pageLength: 10, order: [[0, 'desc']] }); }
});
</script>
@endpush
@endsection
