@extends('layouts.app')
@section('title', 'Rekap Absensi — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Absensi')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Rekap Absensi per Kelas</h1>
      <p class="text-muted small mb-0">Filter tanggal & kelas • rekap hadir/sakit/izin/alpha • input oleh guru per jadwal (Task 2.9).</p>
    </div>
    <span class="badge text-bg-success ms-auto">Hadir nasional: 92%</span>
  </div>
</div>
<div class="card shadow-sm mb-3">
  <div class="card-body p-3">
    <form method="GET" class="row g-2">
      <div class="col-md-4"><label class="form-label small fw-bold">Tanggal</label><input type="date" name="tanggal" class="form-control" value="{{ $tanggal }}"></div>
      <div class="col-md-4"><label class="form-label small fw-bold">Kelas</label><select name="kelas" class="form-select tom-select" onchange="this.form.submit()"><option value="">Semua kelas</option>@foreach ($kelasOptions as $k)<option {{ $filterKelas === $k ? 'selected' : '' }}>{{ $k }}</option>@endforeach</select></div>
      <div class="col-md-4 d-flex align-items-end gap-2"><button class="btn btn-success btn-sm" type="submit"><i class="bi bi-funnel me-1"></i>Tampilkan</button><a href="{{ route('admin.absensi.index') }}" class="btn btn-outline-secondary btn-sm">Reset</a></div>
    </form>
  </div>
</div>
<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table id="tabelAbsensi" class="table table-hover small align-middle w-100">
        <thead class="table-light"><tr><th>Kelas</th><th>Tanggal</th><th>Hadir</th><th>Sakit</th><th>Izin</th><th>Alpha</th><th>Kehadiran</th></tr></thead>
        <tbody>
          @foreach ($rows as $r)
            <tr>
              <td><span class="badge text-bg-success">{{ $r['kelas'] }}</span></td>
              <td>{{ $r['tanggal'] }}</td>
              <td><span class="badge text-bg-success">{{ $r['hadir'] }}</span></td>
              <td><span class="badge text-bg-info">{{ $r['sakit'] }}</span></td>
              <td><span class="badge text-bg-warning text-dark">{{ $r['izin'] }}</span></td>
              <td><span class="badge text-bg-{{ $r['alpha'] > 0 ? 'danger' : 'secondary' }}">{{ $r['alpha'] }}</span></td>
              <td><div class="progress" style="height:8px;min-width:90px;"><div class="progress-bar bg-success" style="width:{{ $r['persen'] }}%"></div></div><span class="small">{{ $r['persen'] }}%</span></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="small text-muted mb-0 mt-2"><i class="bi bi-info-circle me-1"></i>Alpha &gt; 3x/bulan memicu notifikasi ke BK (Task 2.9). Edit dibatasi 1×24 jam.</p>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelAbsensi', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
