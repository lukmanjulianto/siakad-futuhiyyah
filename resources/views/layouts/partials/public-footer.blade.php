{{-- Footer publik persisten (PRD Bab 7) --}}
<footer class="bg-futuhiyyah-dark text-white mt-5 pt-4 pb-3">
  <div class="container">
    <div class="row g-3">
      <div class="col-md-5">
        <h5 class="fw-bold">MTs <span class="text-gold">Futuhiyyah</span></h5>
        <p class="text-white-50 small mb-1">Sistem Informasi Akademik terpadu: data santri, absensi, jurnal guru, pelanggaran, dan prestasi dalam satu pintu.</p>
        <p class="small mb-1"><i class="bi bi-geo-alt me-1 text-gold"></i>Jl. Pesantren Futuhiyyah, Kab. Pekalongan, Jawa Tengah</p>
        <p class="small mb-0"><i class="bi bi-telephone me-1 text-gold"></i>(0285) 000-000 &nbsp; <i class="bi bi-envelope ms-2 me-1 text-gold"></i>info@mtsfutuhiyyah.sch.id</p>
      </div>
      <div class="col-md-4">
        <h6 class="fw-bold">Tautan Cepat</h6>
        <ul class="list-unstyled small">
          <li><a href="{{ route('public.home') }}" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Beranda</a></li>
          <li><a href="{{ route('public.cek-siswa') }}" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Cek Data Siswa</a></li>
          <li><a href="{{ route('public.tentang') }}" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Tentang Madrasah</a></li>
          <li><a href="{{ route('login') }}" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1"></i>Login Pengelola</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h6 class="fw-bold">Jam Layanan</h6>
        <p class="small text-white-50 mb-1">Senin–Kamis & Sabtu: 07.00–15.00</p>
        <p class="small text-white-50 mb-1">Minggu: 07.00–12.00</p>
        <p class="small text-warning mb-0"><i class="bi bi-moon me-1"></i>Jumat: Libur</p>
      </div>
    </div>
    <hr class="border-white-50">
    <p class="small text-white-50 text-center mb-0">&copy; {{ date('Y') }} MTs Futuhiyyah. Seluruh data dilindungi verifikasi ganda NISN + tanggal lahir + nama ibu kandung.</p>
  </div>
</footer>
