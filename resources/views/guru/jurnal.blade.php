@extends('layouts.app')
@section('title', 'Jurnal Mengajar — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Jurnal')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-1">Jurnal Mengajar</h1>
  <p class="text-muted small mb-0">Materi minimal 10 karakter • wajib H+1 • tampil ke publik 1 bulan terakhir.</p>
</div></div>
<div class="row g-3">
  <div class="col-lg-5"><div class="card shadow-sm h-100"><div class="card-body p-4">
    <h2 class="h6 fw-bold mb-3">Form Jurnal (Demo)</h2>
    <div class="mb-2"><label class="form-label small fw-bold">Jadwal</label><select class="form-select">@foreach ($jadwal as $j)<option>{{ $j['mapel'] }} • {{ $j['kelas'] }} • {{ $j['jam'] }}</option>@endforeach</select></div>
    <div class="mb-2"><label class="form-label small fw-bold">Materi (min. 10 karakter)</label><textarea class="form-control" rows="3">Thaharah: macam air dan tata cara wudu sesuai kitab Fathul Qarib.</textarea></div>
    <div class="mb-3"><label class="form-label small fw-bold">Catatan + lampiran (opsional)</label><input class="form-control mb-2" value="Santri antusias; 2 anak perlu remedial wudu."><input type="file" class="form-control"></div>
    <button class="btn btn-success w-100">Kirim Jurnal</button>
  </div></div></div>
  <div class="col-lg-7"><div class="card shadow-sm h-100"><div class="card-body p-4">
    <h2 class="h6 fw-bold mb-3">Riwayat Terkini</h2>
    @foreach ($riwayat as $r)
      <div class="border rounded-2 p-3 mb-2"><p class="small text-muted mb-1">{{ $r['tanggal'] }} • {{ $r['status'] }}</p><p class="small mb-0">{{ $r['materi'] }}</p></div>
    @endforeach
  </div></div></div>
</div>
@endsection
