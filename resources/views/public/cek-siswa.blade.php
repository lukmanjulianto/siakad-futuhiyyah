@extends('layouts.public')
@section('title', 'Cek Data Siswa — Verifikasi NISN & Data Santri')
@section('meta_description', 'Cek data santri MTs Futuhiyyah tanpa login: isi NISN atau nama, tanggal lahir, dan nama ibu kandung.')
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="text-center mb-4">
        <span class="badge text-bg-success mb-2"><i class="bi bi-shield-check me-1"></i>Verifikasi ganda demi privasi santri</span>
        <h1 class="h3 fw-bold">Cek Data Siswa</h1>
        <p class="text-muted">Isi <strong>salah satu</strong> NISN atau nama lengkap, lalu wajib isi tanggal lahir dan nama ibu kandung. Contoh Fase 1 terisi otomatis — Anda tinggal klik.</p>
      </div>
      <div class="card shadow border-0 rounded-3">
        <div class="card-body p-4">
          <form method="GET" action="{{ route('public.cek-siswa.hasil') }}">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label fw-bold small" for="nisn">NISN <span class="text-muted fw-normal">(10 digit)</span></label>
                <input type="text" id="nisn" name="nisn" class="form-control" value="0071234567" inputmode="numeric" placeholder="cth. 0071234567">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold small" for="nama">Nama Siswa</label>
                <input type="text" id="nama" name="nama" class="form-control" value="Ahmad Zaky Mubarok" placeholder="cth. Ahmad Zaky Mubarok">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold small" for="tgl">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" id="tgl" name="tgl_lahir" class="form-control" value="2012-05-14" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold small" for="ibu">Nama Ibu Kandung <span class="text-danger">*</span></label>
                <input type="text" id="ibu" name="ibu" class="form-control" value="Siti Aminah" required placeholder="cth. Siti Aminah">
              </div>
            </div>
            <input type="hidden" name="siswa" value="ahmad">
            <button type="submit" class="btn btn-success w-100 mt-4"><i class="bi bi-person-search me-2"></i>Cek Data Sekarang</button>
            <p class="small text-muted text-center mt-2 mb-0"><i class="bi bi-info-circle me-1"></i>Maksimal 5x percobaan per 10 menit per IP. Hasil berlaku 30 menit.</p>
          </form>
        </div>
      </div>
      <div class="card shadow-sm mt-3">
        <div class="card-body p-3">
          <h2 class="h6 fw-bold mb-2"><i class="bi bi-people me-2 text-futuhiyyah"></i>Coba contoh lain (Fase 1)</h2>
          <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('public.cek-siswa.hasil', ['siswa' => 'ahmad']) }}" class="btn btn-outline-futuhiyyah btn-sm">Ahmad Zaky • VII-A • 240001</a>
            <a href="{{ route('public.cek-siswa.hasil', ['siswa' => 'fatimah']) }}" class="btn btn-outline-futuhiyyah btn-sm">Fatimah Nur Hidayah • VIII-B • 240002</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
