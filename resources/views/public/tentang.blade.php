@extends('layouts.public')
@section('title', 'Tentang MTs Futuhiyyah — Profil, Visi Misi & Kontak')
@section('meta_description', 'Profil MTs Futuhiyyah: visi misi, sejarah pesantren, program unggulan, dan kontak madrasah.')
@section('content')
<section class="bg-futuhiyyah-dark text-white py-5">
  <div class="container">
    <span class="badge text-bg-warning mb-2">Tentang Madrasah</span>
    <h1 class="h3 fw-bold mb-2">MTs Futuhiyyah: Tafaqquh Fiddin dengan Akhlak Pesantren.</h1>
    <p class="text-white-50 mb-0">Berdiri sejak 1987 di bawah Yayasan Futuhiyyah — memadukan Kemenag, kitab kuning, dan pembinaan asrama.</p>
  </div>
</section>

<div class="container py-4">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="card shadow-sm mb-4">
        <div class="card-body p-4">
          <h2 class="h5 fw-bold"><i class="bi bi-flag me-2 text-futuhiyyah"></i>Visi</h2>
          <p class="mb-4">"Terwujudnya santri yang beriman, berilmu, berakhlak mulia, dan unggul dalam prestasi."</p>
          <h2 class="h5 fw-bold"><i class="bi bi-list-task me-2 text-futuhiyyah"></i>Misi</h2>
          <ol class="mb-0">
            <li class="mb-2">Menyelenggarakan KBM yang disiplin, terdokumentasi, dan terpantau wali santri.</li>
            <li class="mb-2">Membina tahfidz, kitab kuning (Nahwu, Shorof, Fiqih), dan bahasa Arab aktif.</li>
            <li class="mb-2">Menegakkan tata tertib melalui pembinaan BK yang mendidik, bukan menghukum.</li>
            <li>Menyinergikan madrasah dan Pondok Futuhiyyah Putra–Putri dalam pengasuhan santri.</li>
          </ol>
        </div>
      </div>
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h2 class="h5 fw-bold"><i class="bi bi-clock-history me-2 text-futuhiyyah"></i>Sejarah Singkat</h2>
          <p class="text-muted">Berawal dari pengajian kitab di surau Kyai Futuh (1987), madrasah ini berkembang menjadi MTs dengan 312 santri dan 28 guru. Sejak 2015 seluruh santri wajib mukim di pondok agar pembinaan ibadah dan akhlak berjalan 24 jam. Kini SIAKAD menjadi ikhtiar kami agar wali yang jauh tetap dekat memantau putra-putrinya.</p>
          <div class="row g-2 mt-1">
            <div class="col-sm-4"><div class="border rounded-2 p-3 text-center"><p class="fw-bold text-futuhiyyah mb-0">1987</p><p class="small text-muted mb-0">Surau dirintis</p></div></div>
            <div class="col-sm-4"><div class="border rounded-2 p-3 text-center"><p class="fw-bold text-futuhiyyah mb-0">2004</p><p class="small text-muted mb-0">Resmi MTs</p></div></div>
            <div class="col-sm-4"><div class="border rounded-2 p-3 text-center"><p class="fw-bold text-futuhiyyah mb-0">2026</p><p class="small text-muted mb-0">SIAKAD diluncurkan</p></div></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow-sm card-hover mb-4">
        <div class="card-body p-4 text-center">
          <span class="bg-futuhiyyah text-white rounded-circle d-inline-flex align-items-center justify-content-center fw-bold" style="width:64px;height:64px;">AH</span>
          <h3 class="h6 fw-bold mt-3 mb-0">Ustadz Abdul Halim, M.Pd</h3>
          <p class="small text-muted">Kepala Madrasah</p>
          <p class="small text-muted fst-italic">"Anak yang terpantau dengan kasih sayang akan tumbuh dengan tanggung jawab. SIAKAD membantu kami dan Anda mengasuh bersama."</p>
        </div>
      </div>
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <h3 class="h6 fw-bold"><i class="bi bi-telephone me-2 text-futuhiyyah"></i>Kontak</h3>
          <p class="small mb-1">Jl. Pesantren Futuhiyyah, Kab. Pekalongan, Jawa Tengah</p>
          <p class="small mb-1">(0285) 000-000 • info@mtsfutuhiyyah.sch.id</p>
          <p class="small mb-3">Senin–Kamis & Sabtu 07.00–15.00 • Minggu 07.00–12.00 • Jumat libur</p>
          <a href="{{ route('public.cek-siswa') }}" class="btn btn-success btn-sm w-100">Cek Data Santri</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
