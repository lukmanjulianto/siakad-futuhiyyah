@extends('layouts.app')
@section('title', 'Dashboard Kepala Madrasah — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Dashboard Eksekutif')
@section('content')
<div class="card shadow-sm border-0 mb-3">
  <div class="card-body p-4">
    <h1 class="h5 fw-bold mb-0">Assalamu'alaikum, Ustadz Abdul Halim!</h1>
    <p class="text-muted small mb-0">Ringkasan eksekutif TA 2025/2026 Ganjil • read-only untuk data operasional, export via menu Laporan.</p>
  </div>
</div>
<div class="row g-3 mb-3">
  @foreach ($stats as $s)
    <div class="col-6 col-xl-3">
      <div class="card card-hover shadow-sm h-100"><div class="card-body d-flex gap-3 align-items-center">
        <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center" style="width:46px;height:46px;"><i class="bi {{ $s['icon'] }} fs-5"></i></span>
        <div><h3 class="fw-bold mb-0">{{ $s['value'] }}</h3><p class="small text-muted mb-0">{{ $s['label'] }}</p></div>
      </div></div>
    </div>
  @endforeach
</div>
<div class="row g-3">
  <div class="col-lg-5">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-2"><i class="bi bi-pie-chart me-2 text-futuhiyyah"></i>Pelanggaran per Level</h2>
      <div id="chartLanggarKepala"></div>
      <p class="small text-muted mb-0">Ringan 4 • Sedang 2 • Berat 0 bulan ini. Detail di BK.</p>
    </div></div>
  </div>
  <div class="col-lg-7">
    <div class="card shadow-sm h-100"><div class="card-body p-4">
      <h2 class="h6 fw-bold mb-3"><i class="bi bi-eye me-2 text-futuhiyyah"></i>Perlu Perhatian Hari Ini</h2>
      <div class="table-responsive"><table class="table table-sm small align-middle mb-0">
        <thead class="table-light"><tr><th>Guru</th><th>Jurnal</th><th>Status</th></tr></thead>
        <tbody>
          @foreach ($monitoring as $m)
            <tr><td>{{ $m['guru'] }}<br><span class="text-muted">{{ $m['mapel'] }}</span></td><td>{{ $m['jurnal'] }}</td><td><span class="badge text-bg-{{ $m['status'] === 'Tuntas' ? 'success' : 'warning' }}">{{ $m['status'] }}</span></td></tr>
          @endforeach
        </tbody>
      </table></div>
      <a href="{{ route('kepala.monitoring') }}" class="btn btn-outline-futuhiyyah btn-sm mt-3">Buka Monitoring<i class="bi bi-arrow-right ms-1"></i></a>
    </div></div>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('#chartLanggarKepala');
  if (el && window.ApexCharts) {
    new ApexCharts(el, {
      chart: { type: 'donut', height: 260 },
      labels: [@foreach ($pie['labels'] as $l)'{{ $l }}',@endforeach],
      series: [{{ implode(',', $pie['series']) }}],
      colors: ['#3B82F6', '#F59E0B', '#DC2626'],
      legend: { position: 'bottom' },
    }).render();
  }
});
</script>
@endpush
@endsection
