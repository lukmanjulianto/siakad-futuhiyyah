@extends('layouts.app')
@section('title', 'Mutasi Keluar — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Mutasi Keluar')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0"><i class="bi bi-box-arrow-right me-2 text-warning"></i>Mutasi Keluar</h1>
      <p class="text-muted small mb-0">Santri berstatus Mutasi Keluar • kolom: Nomor, Nama, NISN, Kelas, Pondok, Sekolah Tujuan, Alasan.</p>
    </div>
    <span class="badge text-bg-warning text-dark ms-auto">{{ count($rows) }} santri mutasi keluar</span>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelMutasiKeluar" class="table table-hover align-middle small w-100">
        <thead class="table-light"><tr><th>No</th><th>Nama</th><th>NISN</th><th>Kelas</th><th>Pondok</th><th>Sekolah Tujuan</th><th>Alasan</th><th>Tanggal</th></tr></thead>
        <tbody>
          @foreach ($rows as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td class="fw-bold">{{ $r['name'] }}<br><span class="text-muted fw-normal">NIS {{ $r['nis'] }}</span></td>
              <td>{{ $r['nisn'] }}</td>
              <td><span class="badge text-bg-warning text-dark">{{ $r['kelas'] }}</span></td>
              <td>{{ $r['pondok'] }}</td>
              <td>{{ $r['sekolah'] }}</td>
              <td>{{ $r['alasan'] }}</td>
              <td>{{ $r['tanggal'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="small text-muted mb-0 mt-2"><i class="bi bi-info-circle me-1"></i>Riwayat dicatat di <code>student_mutations</code> (tipe <code>keluar</code>) pada Task 2.6. Field sekolah tujuan & alasan wajib diisi.</p>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelMutasiKeluar', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
