@extends('layouts.app')
@section('title', 'Naik Kelas — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Naik Kelas')
@section('content')
<div x-data="{ step: 1 }" class="card shadow-sm">
  <div class="card-body p-4">
    <h1 class="h5 fw-bold mb-1">Wizard Naik Kelas</h1>
    <p class="text-muted small mb-3">Massal + custom per santri (naik/tidak) • riwayat tersimpan di <code>student_academic_histories</code> (Task 2.8).</p>
    <div class="progress mb-3" style="height:8px;"><div class="progress-bar bg-success" :style="'width:' + (step/4*100) + '%'"></div></div>
    <div class="d-flex flex-wrap gap-1 mb-3">
      <button class="btn btn-sm" :class="step === 1 ? 'btn-success' : 'btn-outline-secondary'" @click="step = 1">1. Tahun Ajaran</button>
      <button class="btn btn-sm" :class="step === 2 ? 'btn-success' : 'btn-outline-secondary'" @click="step = 2">2. Kelas Asal</button>
      <button class="btn btn-sm" :class="step === 3 ? 'btn-success' : 'btn-outline-secondary'" @click="step = 3">3. Pilih Santri</button>
      <button class="btn btn-sm" :class="step === 4 ? 'btn-success' : 'btn-outline-secondary'" @click="step = 4">4. Proses</button>
    </div>

    <div x-show="step === 1" x-cloak>
      <div class="row g-2">
        <div class="col-md-6"><label class="form-label small fw-bold">Tahun asal</label><select class="form-select"><option>2024/2025 Genap</option></select></div>
        <div class="col-md-6"><label class="form-label small fw-bold">Tahun tujuan</label><select class="form-select"><option>2025/2026 Ganjil (aktif)</option></select></div>
      </div>
      <div class="text-end mt-3"><button class="btn btn-success btn-sm" @click="step = 2">Lanjut<i class="bi bi-arrow-right ms-1"></i></button></div>
    </div>

    <div x-show="step === 2" x-cloak>
      <label class="form-label small fw-bold">Kelas asal</label>
      <select class="form-select tom-select"><option>VII-A</option><option>VII-B</option><option>VII-C</option></select>
      <div class="d-flex justify-content-between mt-3">
        <button class="btn btn-outline-secondary btn-sm" @click="step = 1">Kembali</button>
        <button class="btn btn-success btn-sm" @click="step = 3">Muat Santri</button>
      </div>
    </div>

    <div x-show="step === 3" x-cloak>
      <div class="table-responsive">
        <table class="table table-sm small align-middle">
          <thead class="table-light"><tr><th><input type="checkbox" checked></th><th>NIS</th><th>Nama</th><th>Asal</th><th>Tujuan</th><th>Naik?</th></tr></thead>
          <tbody>
            @foreach ($siswa as $s)
              <tr>
                <td><input type="checkbox" checked></td><td>{{ $s['nis'] }}</td><td class="fw-bold">{{ $s['nama'] }}</td><td>{{ $s['asal'] }}</td>
                <td><select class="form-select form-select-sm"><option>{{ $s['tujuan'] }}</option><option>{{ $s['asal'] }} (tinggal)</option></select></td>
                <td><span class="badge text-bg-{{ $s['naik'] ? 'success' : 'warning' }}">{{ $s['naik'] ? 'Naik' : 'Tinggal' }}</span></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between mt-2">
        <button class="btn btn-outline-secondary btn-sm" @click="step = 2">Kembali</button>
        <button class="btn btn-success btn-sm" @click="step = 4">Pratinjau Proses</button>
      </div>
    </div>

    <div x-show="step === 4" x-cloak>
      <div class="alert alert-success small"><i class="bi bi-check-circle me-1"></i>4 santri naik, 1 tinggal kelas (Maryam Salsabila — pembinaan wali kelas). Klik proses untuk simulasi demo.</div>
      <button class="btn btn-success"><i class="bi bi-arrow-up-circle me-1"></i>Proses Naik Kelas (Demo Fase 1)</button>
    </div>
  </div>
</div>
@endsection
