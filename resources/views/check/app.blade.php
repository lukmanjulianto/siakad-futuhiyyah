@extends('layouts.app')
@section('title', 'Cek Layout Dashboard')
@section('breadcrumb', 'Dashboard / Verifikasi 1.1')
@section('content')
<div class="row g-3">
  <div class="col-md-4"><div class="card card-hover shadow-sm"><div class="card-body"><h6 class="text-muted">Total Santri Aktif</h6><h3 class="fw-bold text-futuhiyyah">312</h3></div></div></div>
  <div class="col-md-4"><div class="card card-hover shadow-sm"><div class="card-body"><h6 class="text-muted">Guru & Tendik</h6><h3 class="fw-bold">28</h3></div></div></div>
  <div class="col-md-4"><div class="card card-hover shadow-sm"><div class="card-body"><h6 class="text-muted">Kelas</h6><h3 class="fw-bold">9 <span class="badge text-bg-warning ms-1">VII–IX</span></h3></div></div></div>
</div>
<div class="card shadow-sm mt-3"><div class="card-body"><div id="check-chart"></div></div></div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.ApexCharts) {
    new ApexCharts(document.querySelector('#check-chart'), {
      chart: { type: 'bar', height: 220 },
      series: [{ name: 'Hadir', data: [30, 29, 31, 28, 30, 27] }],
      xaxis: { categories: ['Senin','Selasa','Rabu','Kamis','Sabtu','Minggu'] }
    }).render();
  }
});
</script>
@endpush
@endsection
