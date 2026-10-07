@extends('layouts.app')
@section('title', 'Monitoring Kepala Madrasah — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Monitoring')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Monitoring Guru, Jurnal & Absensi</h1><p class="text-muted small mb-0">Hanya lihat (read-only) • tegur via BK/Admin bila ada yang tertunda.</p></div>
  <span class="badge text-bg-warning text-dark ms-auto">2 guru perlu perhatian</span>
</div></div>
<div class="card shadow-sm"><div class="card-body p-3">
  <div class="table-responsive"><table id="tabelMonitoringKepala" class="table table-hover small align-middle w-100">
    <thead class="table-light"><tr><th>Guru</th><th>Jurnal</th><th>Absensi</th><th>Status</th></tr></thead>
    <tbody>
      @foreach ($rows as $m)
        <tr>
          <td class="fw-bold">{{ $m['guru'] }}<br><span class="text-muted fw-normal">{{ $m['mapel'] }}</span></td>
          <td>{{ $m['jurnal'] }}</td><td>{{ $m['absensi'] }}</td>
          <td><span class="badge text-bg-{{ $m['status'] === 'Tuntas' ? 'success' : 'warning' }}">{{ $m['status'] }}</span></td>
        </tr>
      @endforeach
    </tbody>
  </table></div>
</div></div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelMonitoringKepala', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
