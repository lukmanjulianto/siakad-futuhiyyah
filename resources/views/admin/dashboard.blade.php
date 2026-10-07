@extends('layouts.app')
@section('title', 'Dashboard Admin — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Dashboard Admin')
@section('content')
{{-- Sapaan --}}
<div class="card shadow-sm border-0 mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-3 align-items-center">
    <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center" style="width:52px;height:52px;"><i class="bi bi-sunrise fs-4"></i></span>
    <div>
      <h1 class="h5 fw-bold mb-0">Assalamu'alaikum, Administrator!</h1>
      <p class="text-muted small mb-0">{{ $today }} • Tahun Ajaran 2025/2026 Ganjil • Semangat mendata kebaikan santri hari ini.</p>
    </div>
    <div class="ms-auto d-flex gap-2">
      <a href="/admin/siswa/create" class="btn btn-success btn-sm"><i class="bi bi-person-plus me-1"></i>Tambah Siswa</a>
      <a href="/admin/laporan" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-download me-1"></i>Export</a>
    </div>
  </div>
</div>

{{-- 5 kartu statistik --}}
<div class="row g-3 mb-3">
  @foreach ($cards as $c)
    <div class="col-6 col-xl">
      <div class="card card-hover shadow-sm h-100">
        <div class="card-body d-flex gap-3 align-items-center">
          <span class="{{ $c['color'] }} text-white rounded-3 d-inline-flex align-items-center justify-content-center" style="width:46px;height:46px;"><i class="bi {{ $c['icon'] }} fs-5"></i></span>
          <div><h3 class="fw-bold mb-0">{{ $c['value'] }}</h3><p class="small fw-bold mb-0">{{ $c['label'] }}</p><p class="small text-muted mb-0">{{ $c['sub'] }}</p></div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="row g-3">
  {{-- Grafik kehadiran 7 hari --}}
  <div class="col-lg-8">
    <div class="card shadow-sm h-100">
      <div class="card-body p-4">
        <div class="d-flex align-items-center mb-2">
          <h2 class="h6 fw-bold mb-0"><i class="bi bi-bar-chart me-2 text-futuhiyyah"></i>Kehadiran per Jenjang 7 Hari Terakhir (%)</h2>
          <span class="badge text-bg-warning text-dark ms-auto">Jumat libur</span>
        </div>
        <div id="chartHadir"></div>
        <p class="small text-muted mb-0">Senin–Minggu • Jumat tidak ada KBM. Data dummy Fase 1, query nyata di Task 2.13.</p>
      </div>
    </div>
  </div>

  {{-- Aktivitas terbaru --}}
  <div class="col-lg-4">
    <div class="card shadow-sm h-100">
      <div class="card-body p-4">
        <h2 class="h6 fw-bold mb-3"><i class="bi bi-activity me-2 text-futuhiyyah"></i>Aktivitas Terbaru</h2>
        <ul class="list-unstyled mb-0">
          @foreach ($activities as $a)
            <li class="d-flex gap-2 mb-3">
              <i class="bi {{ $a['icon'] }} {{ $a['color'] }} fs-5"></i>
              <div><p class="small mb-0">{{ $a['text'] }}</p><p class="small text-muted mb-0">{{ $a['time'] }}</p></div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

  {{-- Akses cepat --}}
  <div class="col-lg-4">
    <div class="card shadow-sm h-100">
      <div class="card-body p-4">
        <h2 class="h6 fw-bold mb-3"><i class="bi bi-lightning me-2 text-gold"></i>Akses Cepat</h2>
        <div class="d-grid gap-2">
          @foreach ($quickLinks as $q)
            <a href="{{ $q['url'] }}" class="btn btn-outline-futuhiyyah btn-sm text-start"><i class="bi {{ $q['icon'] }} me-2"></i>{{ $q['label'] }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  {{-- Jadwal hari ini --}}
  <div class="col-lg-8">
    <div class="card shadow-sm h-100">
      <div class="card-body p-4">
        <h2 class="h6 fw-bold mb-3"><i class="bi bi-calendar-day me-2 text-futuhiyyah"></i>Jadwal Hari Ini</h2>
        <div class="table-responsive">
          <table class="table table-hover small align-middle mb-0">
            <thead class="table-light"><tr><th>Jam</th><th>Mapel</th><th>Kelas</th><th>Guru</th></tr></thead>
            <tbody>
              @foreach ($schedules as $s)
                <tr><td>{{ $s['jam'] }}</td><td class="fw-bold">{{ $s['mapel'] }}</td><td><span class="badge text-bg-success">{{ $s['kelas'] }}</span></td><td>{{ $s['guru'] }}</td></tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('#chartHadir');
  if (el && window.ApexCharts) {
    new ApexCharts(el, {
      chart: { type: 'bar', height: 300, stacked: false },
      plotOptions: { bar: { columnWidth: '55%', borderRadius: 4 } },
      dataLabels: { enabled: false },
      colors: ['#0F7B3E', '#3B82F6', '#C9A227'],
      series: [
        @foreach ($attendance['series'] as $s)
          { name: '{{ $s['name'] }}', data: [{{ implode(',', array_map(fn ($v) => is_null($v) ? 'null' : $v, $s['data'])) }}] },
        @endforeach
      ],
      xaxis: { categories: [@foreach ($attendance['days'] as $d)'{{ $d }}',@endforeach] },
      yaxis: { min: 80, max: 100, labels: { formatter: (v) => v + '%' } },
      tooltip: { y: { formatter: (v) => v === null ? 'Libur' : v + '%' } },
      legend: { position: 'bottom' },
    }).render();
  }
});
</script>
@endpush
@endsection
