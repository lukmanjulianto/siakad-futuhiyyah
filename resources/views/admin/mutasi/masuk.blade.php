@extends('layouts.app')
@section('title', 'Mutasi Masuk — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Mutasi Masuk')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0"><i class="bi bi-box-arrow-in-right me-2 text-success"></i>Mutasi Masuk</h1>
      <p class="text-muted small mb-0">Santri berstatus Aktif (Mutasi Masuk) • kolom: Nomor, Nama, NISN, Kelas, Pondok, Asal Sekolah, Alasan.</p>
    </div>
    <a href="{{ route('admin.siswa.create') }}" class="btn btn-success btn-sm ms-auto"><i class="bi bi-person-plus me-1"></i>Catat Mutasi Masuk</a>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelMutasiMasuk" class="table table-hover align-middle small w-100">
        <thead class="table-light"><tr><th>No</th><th>Nama</th><th>NISN</th><th>Kelas</th><th>Pondok</th><th>Asal Sekolah</th><th>Alasan</th><th>Tanggal</th></tr></thead>
        <tbody>
          @foreach ($rows as $i => $r)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td class="fw-bold">{{ $r['name'] }}<br><span class="text-muted fw-normal">NIS {{ $r['nis'] }}</span></td>
              <td>{{ $r['nisn'] }}</td>
              <td><span class="badge text-bg-success">{{ $r['kelas'] }}</span></td>
              <td>{{ $r['pondok'] }}</td>
              <td>{{ $r['sekolah'] }}</td>
              <td>{{ $r['alasan'] }}</td>
              <td>{{ $r['tanggal'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="small text-muted mb-0 mt-2"><i class="bi bi-info-circle me-1"></i>Riwayat dicatat di <code>student_mutations</code> (tipe <code>masuk</code>) pada Task 2.6. Status diubah via form edit siswa.</p>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelMutasiMasuk', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
