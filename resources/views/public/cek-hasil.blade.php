@extends('layouts.public')
@section('title', 'Hasil Cek — ' . $student['name'] . ' • SIAKAD Futuhiyyah')
@section('meta_description', 'Hasil pantauan santri: profil, pelanggaran, kehadiran, jurnal, dan prestasi.')
@section('content')
<div class="container py-4">
  <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
    <a href="{{ route('public.cek-siswa') }}" class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-arrow-left me-1"></i>Cek lain</a>
    <span class="badge text-bg-success">Terverifikasi • berlaku 30 menit</span>
    <div class="ms-auto d-flex gap-2">
      @foreach ($students as $k => $s)
        <a href="{{ route('public.cek-siswa.hasil', ['siswa' => $k]) }}" class="btn btn-sm {{ $k === $activeKey ? 'btn-success' : 'btn-outline-futuhiyyah' }}">{{ $s['nis_lokal'] }} • {{ explode(' ', $s['name'])[0] }}</a>
      @endforeach
    </div>
  </div>

  <div class="row g-3">
    {{-- 1. Card Profil --}}
    <div class="col-lg-4">
      <div class="card shadow-sm card-hover h-100">
        <div class="card-body p-4 text-center">
          <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center fw-bold fs-4" style="width:72px;height:72px;">{{ $student['initials'] }}</span>
          <h1 class="h5 fw-bold mt-3 mb-1">{{ $student['name'] }}</h1>
          <p class="text-muted small mb-3">NIS {{ $student['nis_lokal'] }} • NISN {{ $student['nisn'] }} • Kelas {{ $student['kelas'] }}</p>
          <span class="badge text-bg-success mb-3">{{ $student['status'] }}</span>
          <ul class="list-group list-group-flush text-start small">
            <li class="list-group-item"><i class="bi bi-house-heart me-2 text-futuhiyyah"></i>{{ $student['pondok'] }}</li>
            <li class="list-group-item"><i class="bi bi-envelope me-2 text-futuhiyyah"></i>{{ $student['email'] }}</li>
            <li class="list-group-item"><i class="bi bi-telephone me-2 text-futuhiyyah"></i>{{ $student['phone'] }}</li>
            <li class="list-group-item"><i class="bi bi-person me-2 text-futuhiyyah"></i>Wali kelas: {{ $student['wali_kelas'] }}</li>
            <li class="list-group-item"><i class="bi bi-cake me-2 text-futuhiyyah"></i>{{ $student['birth_date_indo'] }}</li>
          </ul>
        </div>
      </div>
    </div>

    {{-- 2. Pie pelanggaran --}}
    <div class="col-lg-8">
      <div class="card shadow-sm h-100">
        <div class="card-body p-4">
          <div class="d-flex align-items-center mb-2">
            <h2 class="h6 fw-bold mb-0"><i class="bi bi-pie-chart me-2 text-futuhiyyah"></i>Komposisi Pelanggaran</h2>
            <span class="badge text-bg-warning text-dark ms-auto">Total {{ $totalPoin }} poin</span>
          </div>
          <div id="piePelanggaran"></div>
          <p class="small text-muted mb-0">Ringan 1–10 poin • Sedang 11–30 • Berat &gt;30. Setiap tindak lanjut dicatat BK & pondok.</p>
        </div>
      </div>
    </div>

    {{-- 3. Tidak masuk 1 pekan --}}
    <div class="col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body p-4">
          <h2 class="h6 fw-bold mb-3"><i class="bi bi-calendar-x me-2 text-danger"></i>Tidak Masuk 1 Pekan Terakhir</h2>
          <div class="table-responsive">
            <table class="table table-hover small align-middle mb-0">
              <thead class="table-light"><tr><th>Hari</th><th>Tanggal</th><th>Mapel</th><th>Guru</th><th>Alasan</th></tr></thead>
              <tbody>
                @foreach ($absences as $a)
                  <tr><td>{{ $a['hari'] }}</td><td>{{ $a['tanggal'] }}</td><td>{{ $a['mapel'] }}</td><td>{{ $a['guru'] }}</td><td>{{ $a['alasan'] }}</td></tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- 4. Ringkasan pelanggaran --}}
    <div class="col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body p-4">
          <h2 class="h6 fw-bold mb-3"><i class="bi bi-exclamation-triangle me-2 text-warning"></i>Ringkasan Pelanggaran</h2>
          <div class="table-responsive">
            <table class="table table-hover small align-middle mb-0">
              <thead class="table-light"><tr><th>Tanggal</th><th>Jenis</th><th>Level</th><th>Poin</th><th>Status</th></tr></thead>
              <tbody>
                @foreach ($violations as $v)
                  <tr>
                    <td>{{ $v['tanggal'] }}</td><td>{{ $v['jenis'] }}</td>
                    <td><span class="badge {{ $v['level'] === 'Ringan' ? 'badge-ringan' : 'badge-sedang' }}">{{ $v['level'] }}</span></td>
                    <td class="fw-bold">{{ $v['poin'] }}</td>
                    <td><span class="badge text-bg-{{ $v['badge'] }}">{{ $v['status'] }}</span></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- 5. Jurnal & materi 1 bulan --}}
    <div class="col-12">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h2 class="h6 fw-bold mb-3"><i class="bi bi-journal-text me-2 text-futuhiyyah"></i>History Jadwal & Materi 1 Bulan Terakhir</h2>
          <div class="table-responsive">
            <table class="table table-hover small align-middle mb-0">
              <thead class="table-light"><tr><th>Hari/Tanggal</th><th>Mapel</th><th>Guru</th><th>Materi</th></tr></thead>
              <tbody>
                @foreach ($journals as $j)
                  <tr><td>{{ $j['hari'] }}</td><td class="fw-bold">{{ $j['mapel'] }}</td><td>{{ $j['guru'] }}</td><td>{{ $j['materi'] }}</td></tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- 6. Prestasi --}}
    <div class="col-12">
      <div class="card shadow-sm border-gold">
        <div class="card-body p-4">
          <h2 class="h6 fw-bold mb-3"><i class="bi bi-award me-2 text-gold"></i>Prestasi Santri</h2>
          <div class="row g-3">
            @foreach ($achievements as $p)
              <div class="col-md-6">
                <div class="border rounded-3 p-3 h-100">
                  <span class="badge text-bg-warning text-dark mb-2">{{ $p['tingkat'] }}</span>
                  <p class="fw-bold mb-1">{{ $p['nama'] }}</p>
                  <p class="small text-muted mb-0">{{ $p['tanggal'] }} • {{ $p['penyelenggara'] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const el = document.querySelector('#piePelanggaran');
  if (el && window.ApexCharts) {
    new ApexCharts(el, {
      chart: { type: 'pie', height: 260 },
      labels: ['Ringan', 'Sedang', 'Berat'],
      series: [@foreach ($pie as $n){{ $n }},@endforeach],
      colors: ['#3B82F6', '#F59E0B', '#DC2626'],
      legend: { position: 'bottom' },
    }).render();
  }
});
</script>
@endpush
@endsection
