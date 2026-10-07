@extends('layouts.app')
@section('title', 'Laporan — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Laporan')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4">
    <h1 class="h5 fw-bold mb-1">Pusat Laporan Akademik & Kesiswaan</h1>
    <p class="text-muted small mb-0">Pilih jenis, rentang tanggal/TA/kelas → pratinjau → export sekali klik. Nama file: <code>{jenis}_{tahun-ajaran}_{timestamp}.xlsx/pdf</code>. Export massal via queue database (Task 2.13).</p>
  </div>
</div>
<div class="row g-3">
  <div class="col-lg-4">
    <div class="card shadow-sm h-100">
      <div class="card-body p-4">
        <h2 class="h6 fw-bold mb-3"><i class="bi bi-funnel me-2 text-futuhiyyah"></i>Parameter Laporan</h2>
        <form method="GET">
          <div class="mb-2"><label class="form-label small fw-bold">Jenis laporan</label><select name="jenis" class="form-select" onchange="this.form.submit()">@foreach ($jenisOptions as $k => $v)<option value="{{ $k }}" {{ $jenis === $k ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
          <div class="row g-2">
            <div class="col-6"><label class="form-label small fw-bold">Dari</label><input type="date" name="dari" class="form-control" value="{{ $dari }}"></div>
            <div class="col-6"><label class="form-label small fw-bold">Sampai</label><input type="date" name="sampai" class="form-control" value="{{ $sampai }}"></div>
          </div>
          <div class="mt-2"><label class="form-label small fw-bold">Kelas (opsional)</label><select name="kelas" class="form-select tom-select"><option value="">Semua kelas</option>@foreach ($kelasOptions as $k)<option {{ $kelas === $k ? 'selected' : '' }}>{{ $k }}</option>@endforeach</select></div>
          <button class="btn btn-success btn-sm w-100 mt-3" type="submit"><i class="bi bi-eye me-1"></i>Tampilkan Pratinjau</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="card shadow-sm h-100">
      <div class="card-body p-4">
        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
          <h2 class="h6 fw-bold mb-0">Pratinjau: {{ $jenisOptions[$jenis] }}</h2>
          <span class="badge text-bg-secondary ms-auto">{{ $filename }}.xlsx</span>
        </div>
        <div class="table-responsive mb-3">
          <table class="table table-sm small align-middle">
            <tbody>
              @foreach ($preview as $p)
                <tr>@foreach ($p as $c)<td>{{ $c }}</td>@endforeach</tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="d-flex flex-wrap gap-2">
          <button class="btn btn-success btn-sm"><i class="bi bi-file-earmark-excel me-1"></i>Export Excel (Demo)</button>
          <button class="btn btn-outline-futuhiyyah btn-sm"><i class="bi bi-file-earmark-pdf me-1"></i>Export PDF (Demo)</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
