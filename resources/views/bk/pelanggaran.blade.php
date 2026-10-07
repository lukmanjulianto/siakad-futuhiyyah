@extends('layouts.app')
@section('title', 'Validasi Pelanggaran BK — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Validasi Pelanggaran')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Validasi Pelanggaran</h1><p class="text-muted small mb-0">Ubah <code>pending → verified_bk</code> + tulis catatan BK. Notifikasi ke pondok otomatis (Task 2.11).</p></div>
  <span class="badge text-bg-warning text-dark ms-auto">3 menunggu verifikasi</span>
</div></div>
<div class="card shadow-sm"><div class="card-body p-3"><div class="table-responsive">
  <table id="tabelBkLanggar" class="table table-hover small align-middle w-100">
    <thead class="table-light"><tr><th>Tanggal</th><th>Santri</th><th>Kategori</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
    <tbody>
      @foreach ($rows as $r)
        <tr>
          <td>{{ $r['tanggal'] }}</td>
          <td class="fw-bold">{{ $r['santri'] }}<br><span class="text-muted fw-normal">{{ $r['kelas'] }}</span></td>
          <td>{{ $r['kategori'] }} ({{ $r['poin'] }})</td>
          <td><span class="badge text-bg-info">{{ $statusOptions[$r['status']] }}</span></td>
          <td class="text-end text-nowrap"><button class="btn btn-sm btn-success">Verifikasi</button> <button class="btn btn-sm btn-outline-futuhiyyah">Catatan BK</button></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div></div></div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelBkLanggar', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
