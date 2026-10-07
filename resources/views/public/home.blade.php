@extends('layouts.public')
@section('title', 'SIAKAD Futuhiyyah — Sistem Informasi Akademik MTs Futuhiyyah')
@section('meta_description', 'Portal resmi MTs Futuhiyyah: cek data santri tanpa login, pantau absensi, pelanggaran, jurnal, dan prestasi.')
@section('content')
{{-- HERO --}}
<section class="bg-futuhiyyah-dark text-white py-5">
  <div class="container py-3">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <span class="badge text-bg-warning mb-3"><i class="bi bi-moon-stars me-1"></i>MTs Futuhiyyah • Islami • Modern • Transparan</span>
        <h1 class="display-6 fw-bold mb-3">Satu Pintu Data Santri, <span class="text-gold">Mudah Dipantau Wali & Pondok.</span></h1>
        <p class="text-white-50 mb-4">SIAKAD Futuhiyyah mendigitalkan data santri, absensi per mapel, jurnal guru, pelanggaran, dan prestasi. Orang tua cukup verifikasi NISN, tanggal lahir, dan nama ibu kandung — tanpa perlu akun.</p>
        <div class="d-flex flex-wrap gap-2">
          <a href="{{ route('public.cek-siswa') }}" class="btn btn-warning fw-bold rounded-2"><i class="bi bi-person-search me-2"></i>Cek Data Siswa</a>
          <a href="{{ route('login') }}" class="btn btn-outline-light rounded-2"><i class="bi bi-box-arrow-in-right me-2"></i>Login Pengelola</a>
        </div>
        <p class="small text-white-50 mt-3 mb-0"><i class="bi bi-shield-check me-1 text-gold"></i>Data sensitif (NIK, KK, alamat lengkap) tidak pernah ditampilkan ke publik.</p>
      </div>
      <div class="col-lg-5">
        <div class="card border-0 shadow rounded-3">
          <div class="card-body p-4">
            <h6 class="fw-bold mb-3"><i class="bi bi-person-badge me-2 text-futuhiyyah"></i>Contoh hasil verifikasi</h6>
            <div class="d-flex gap-3 align-items-center mb-3">
              <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center fw-bold" style="width:56px;height:56px;">AZ</span>
              <div>
                <p class="fw-bold mb-0">Ahmad Zaky Mubarok</p>
                <p class="small text-muted mb-0">NIS 240001 • Kelas VII-A • Pondok Futuhiyyah Putra</p>
              </div>
            </div>
            <div class="row g-2 text-center">
              <div class="col-4"><div class="border rounded-2 py-2"><p class="fw-bold mb-0 text-success">96%</p><p class="small text-muted mb-0">Hadir</p></div></div>
              <div class="col-4"><div class="border rounded-2 py-2"><p class="fw-bold mb-0 text-warning">20</p><p class="small text-muted mb-0">Poin</p></div></div>
              <div class="col-4"><div class="border rounded-2 py-2"><p class="fw-bold mb-0 text-futuhiyyah">2</p><p class="small text-muted mb-0">Prestasi</p></div></div>
            </div>
            <a href="{{ route('public.cek-siswa.hasil', ['siswa' => 'ahmad']) }}" class="btn btn-success btn-sm w-100 mt-3">Lihat contoh hasil<i class="bi bi-arrow-right ms-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- STATISTIK --}}
<section class="container py-4">
  <div class="row g-3">
    @foreach ($stats as $s)
      <div class="col-6 col-lg-3">
        <div class="card card-hover shadow-sm h-100">
          <div class="card-body d-flex gap-3 align-items-center">
            <span class="bg-futuhiyyah text-white rounded-3 d-inline-flex align-items-center justify-content-center" style="width:46px;height:46px;"><i class="bi {{ $s['icon'] }} fs-5"></i></span>
            <div><h4 class="fw-bold mb-0">{{ $s['value'] }}</h4><p class="small text-muted mb-0">{{ $s['label'] }}</p></div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>

{{-- PROFIL + KEUNGGULAN --}}
<section class="container py-4">
  <div class="row g-4 align-items-stretch">
    <div class="col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body p-4">
          <span class="badge text-bg-success mb-2">Profil Madrasah</span>
          <h2 class="h4 fw-bold">MTs Futuhiyyah: Adab Dulu, Baru Ilmu.</h2>
          <p class="text-muted">Madrasah tsanawiyah berbasis pesantren di Kabupaten Pekalongan. Kami memadukan kurikulum Kemenag, kitab kuning (Nahwu–Shorof, Fiqih, Akidah Akhlak), dan pembinaan asrama Pondok Futuhiyyah Putra–Putri.</p>
          <ul class="list-unstyled small">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Absensi tercatat per mata pelajaran, bukan sekadar per hari.</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Pelanggaran terverifikasi BK dan ditindaklanjuti pondok.</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Jurnal mengajar terdokumentasi dan bisa dipantau wali.</li>
            <li><i class="bi bi-check-circle-fill text-success me-2"></i>Jumat libur; KBM Senin–Kamis, Sabtu, Minggu.</li>
          </ul>
          <a href="{{ route('public.tentang') }}" class="btn btn-outline-futuhiyyah btn-sm mt-2">Profil lengkap<i class="bi bi-arrow-right ms-2"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="row g-3">
        <div class="col-sm-6"><div class="card card-hover shadow-sm h-100"><div class="card-body"><i class="bi bi-search-heart fs-4 text-futuhiyyah"></i><h6 class="fw-bold mt-2">Cek Tanpa Login</h6><p class="small text-muted mb-0">Cukup NISN/nama + tanggal lahir + nama ibu kandung.</p></div></div></div>
        <div class="col-sm-6"><div class="card card-hover shadow-sm h-100"><div class="card-body"><i class="bi bi-calendar-check fs-4 text-futuhiyyah"></i><h6 class="fw-bold mt-2">Absensi Real-Time</h6><p class="small text-muted mb-0">Diisi guru tiap mapel, terpantau dalam hitungan menit.</p></div></div></div>
        <div class="col-sm-6"><div class="card card-hover shadow-sm h-100"><div class="card-body"><i class="bi bi-shield-check fs-4 text-futuhiyyah"></i><h6 class="fw-bold mt-2">Pelanggaran Terkoordinasi</h6><p class="small text-muted mb-0">Dari input guru hingga tindak lanjut BK & pondok.</p></div></div></div>
        <div class="col-sm-6"><div class="card card-hover shadow-sm h-100"><div class="card-body"><i class="bi bi-award fs-4 text-gold"></i><h6 class="fw-bold mt-2">Prestasi Diapresiasi</h6><p class="small text-muted mb-0">MTQ, pidato bahasa Arab, hingga olimpiade madrasah.</p></div></div></div>
      </div>
    </div>
  </div>
</section>

{{-- ALUR + CTA --}}
<section class="container pb-5">
  <div class="card bg-futuhiyyah-dark text-white shadow border-0 rounded-3">
    <div class="card-body p-4">
      <div class="row g-3 align-items-center">
        <div class="col-lg-8">
          <h3 class="h5 fw-bold mb-3">Cara memantau putra-putri Anda dalam 1 menit</h3>
          <div class="row g-2 small">
            <div class="col-md-4"><div class="bg-white text-dark rounded-2 p-3 h-100"><p class="fw-bold mb-1">1. Buka Cek Data</p><p class="mb-0 text-muted">Siapkan NISN atau nama lengkap santri.</p></div></div>
            <div class="col-md-4"><div class="bg-white text-dark rounded-2 p-3 h-100"><p class="fw-bold mb-1">2. Verifikasi</p><p class="mb-0 text-muted">Isi tanggal lahir + nama ibu kandung.</p></div></div>
            <div class="col-md-4"><div class="bg-white text-dark rounded-2 p-3 h-100"><p class="fw-bold mb-1">3. Pantau</p><p class="mb-0 text-muted">Lihat kehadiran, pelanggaran & prestasi.</p></div></div>
          </div>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="{{ route('public.cek-siswa') }}" class="btn btn-warning fw-bold rounded-2"><i class="bi bi-person-search me-2"></i>Mulai Cek Sekarang</a>
          <p class="small text-white-50 mt-2 mb-0">Maksimal 5x percobaan per 10 menit demi keamanan data.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
