{{-- Wizard 6 tab siswa (PRD Bab 6.C). Dipakai create & edit. --}}
@php
  $v = fn ($k, $d = '') => old($k, $row[$k] ?? $d);
  $steps = ['1 Data Siswa', '2 Orang Tua', '3 Alamat', '4 Aktivitas Belajar', '5 Beasiswa', '6 Prestasi'];
@endphp
<div x-data="{ step: 1 }" class="card shadow-sm">
  <div class="card-body p-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <h1 class="h5 fw-bold mb-0">{{ $isEdit ? 'Ubah Siswa: ' . ($row['name'] ?? '') : 'Tambah Siswa Baru' }}</h1>
      <span class="badge text-bg-success">Wizard 6 tab • simpan di Tab 6</span>
    </div>
    <div class="progress mb-3" style="height:8px;"><div class="progress-bar bg-success" :style="'width:' + (step/6*100) + '%'"></div></div>
    <div class="d-flex flex-wrap gap-1 mb-4">
      @foreach ($steps as $i => $s)
        <button type="button" class="btn btn-sm" :class="step === {{ $i + 1 }} ? 'btn-success' : 'btn-outline-secondary'" @click="step = {{ $i + 1 }}">{{ $s }}</button>
      @endforeach
    </div>

    <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return false;">
      @csrf

      {{-- TAB 1 --}}
      <div x-show="step === 1" x-cloak>
        <h2 class="h6 fw-bold mb-3">Tab 1 — Data Siswa</h2>
        <div class="row g-2">
          <div class="col-md-4"><label class="form-label small fw-bold">Foto (jpg/png, maks 2MB)</label><input type="file" name="photo" class="form-control" accept=".jpg,.jpeg,.png"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">NISN (10 digit unik) *</label><input name="nisn" class="form-control" value="{{ $v('nisn', $isEdit ? '' : '0071234575') }}" pattern="[0-9]{10}" required></div>
          <div class="col-md-4"><label class="form-label small fw-bold">NIS Lokal (6 digit unik) *</label><input name="nis_lokal" class="form-control" value="{{ $v('nis', $isEdit ? '' : '240009') }}" pattern="[0-9]{6}" required></div>
          <div class="col-md-6"><label class="form-label small fw-bold">Nama lengkap *</label><input name="name" class="form-control" value="{{ $v('name', 'Muhammad Syarif Hidayat') }}" required></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Panggilan</label><input name="nickname" class="form-control" value="Syarif"></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Kewarganegaraan</label><select name="citizenship" class="form-select"><option>WNI</option><option>WNA</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">NIK</label><input name="nik" class="form-control" value="3322110101120001"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Tempat lahir *</label><input name="birth_place" class="form-control" value="Pekalongan" required></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Tanggal lahir *</label><input type="date" name="birth_date" class="form-control" value="2012-03-10" required></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Jenis kelamin</label><select name="gender" class="form-select"><option value="L">Laki-laki</option><option value="P">Perempuan</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Anak ke</label><input type="number" name="birth_order" class="form-control" value="2"></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Jml saudara</label><input type="number" name="siblings_count" class="form-control" value="3"></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Agama</label><select name="religion" class="form-select"><option>Islam</option><option>Kristen Protestan</option><option>Katolik</option><option>Hindu</option><option>Buddha</option><option>Kong Hu Cu</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Pondok</label><select name="pondok" class="form-select tom-select"><option>Pondok Futuhiyyah Putra</option><option>Pondok Futuhiyyah Putri</option><option>Non-pondok</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Cita-cita</label><input name="aspiration" class="form-control" value="Ustadz"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Hobi</label><input name="hobby" class="form-control" value="Tilawah"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">HP santri</label><input name="student_phone" class="form-control" value="0812-0000-1111"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Email santri</label><input type="email" name="student_email" class="form-control" value="syarif@student.mtsfutuhiyyah.sch.id"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">No. KIP</label><input name="kip_number" class="form-control" value=""></div>
          <div class="col-md-6"><label class="form-label small fw-bold">No. KK / Kepala keluarga</label><div class="input-group"><input name="kk_number" class="form-control" value="3322110101120001"><input name="family_head_name" class="form-control" value="H. Ahmad Ridwan"></div></div>
          <div class="col-md-6"><label class="form-label small fw-bold">Dokumen (KK, KIP, Ijazah SD, SMP, NU — pdf/jpg, 2MB)</label><input type="file" name="dokumen[]" class="form-control" multiple accept=".pdf,.jpg,.jpeg,.png"></div>
        </div>
      </div>

      {{-- TAB 2 --}}
      <div x-show="step === 2" x-cloak>
        <h2 class="h6 fw-bold mb-3">Tab 2 — Data Orang Tua</h2>
        <div class="row g-2">
          <div class="col-12"><span class="badge text-bg-success">Ayah</span></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Nama ayah</label><input name="father_name" class="form-control" value="H. Ahmad Ridwan"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Status</label><select name="father_status" class="form-select"><option>masih hidup</option><option>sudah meninggal</option><option>tidak diketahui</option><option>cerai</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">NIK ayah</label><input name="father_nik" class="form-control" value="3322110101700001"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Pendidikan</label><select name="father_education" class="form-select"><option>SMA</option><option>S1</option><option>Pesantren</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Pekerjaan</label><select name="father_job" class="form-select"><option>Wiraswasta</option><option>Petani</option><option>PNS</option><option>Ustadz</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">HP ayah</label><input name="father_phone" class="form-control" value="0812-2222-3333"></div>
          <div class="col-12 mt-2"><span class="badge text-bg-success">Ibu (nama wajib — kunci verifikasi publik)</span></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Nama ibu *</label><input name="mother_name" class="form-control" value="Siti Aminah" required></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Status</label><select name="mother_status" class="form-select"><option>masih hidup</option><option>sudah meninggal</option><option>tidak diketahui</option><option>cerai</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">NIK ibu</label><input name="mother_nik" class="form-control" value="3322110101750002"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Pendidikan</label><select name="mother_education" class="form-select"><option>SMA</option><option>S1</option><option>Pesantren</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Pekerjaan</label><select name="mother_job" class="form-select"><option>Ibu Rumah Tangga</option><option>Guru</option><option>Wiraswasta</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">HP ibu</label><input name="mother_phone" class="form-control" value="0812-4444-5555"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Penghasilan ortu</label><select name="parent_income_range" class="form-select"><option>Rp1–2 juta</option><option>Rp2–5 juta</option><option>> Rp5 juta</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">No. KKS / PKH + berkas</label><div class="input-group"><input name="kks_number" class="form-control" placeholder="KKS"><input type="file" name="kks_file" class="form-control"></div></div>
          <div class="col-md-4"><label class="form-label small fw-bold">No. PKH + berkas</label><div class="input-group"><input name="pkh_number" class="form-control" placeholder="PKH"><input type="file" name="pkh_file" class="form-control"></div></div>
        </div>
      </div>

      {{-- TAB 3 --}}
      <div x-show="step === 3" x-cloak>
        <h2 class="h6 fw-bold mb-3">Tab 3 — Data Alamat (cascading dummy)</h2>
        @foreach (['parent' => 'Orang Tua', 'student' => 'Santri'] as $p => $label)
          <p class="fw-bold small mb-2 mt-2"><i class="bi bi-geo-alt me-1"></i>Alamat {{ $label }}</p>
          <div class="row g-2">
            @foreach (['province' => 'Provinsi', 'regency' => 'Kabupaten', 'district' => 'Kecamatan', 'village' => 'Kelurahan'] as $w => $wl)
              <div class="col-md-3"><label class="form-label small fw-bold">{{ $wl }}</label>
                <select name="{{ $p }}_{{ $w }}" class="form-select tom-select">
                  @foreach ($wilayah[str_replace('province', 'provinces', str_replace('regency', 'regencies', str_replace('district', 'districts', str_replace('village', 'villages', $w))))] ?? $wilayah['provinces'] as $o)
                    <option>{{ $o }}</option>
                  @endforeach
                </select>
              </div>
            @endforeach
            <div class="col-md-2"><label class="form-label small fw-bold">RT</label><input name="{{ $p }}_rt" class="form-control" value="03"></div>
            <div class="col-md-2"><label class="form-label small fw-bold">RW</label><input name="{{ $p }}_rw" class="form-control" value="01"></div>
            <div class="col-md-8"><label class="form-label small fw-bold">Jalan / alamat</label><input name="{{ $p }}_address" class="form-control" value="Jl. Pesantren No. 12, Wiradesa, Pekalongan"></div>
          </div>
        @endforeach
        <p class="small text-muted mt-2 mb-0"><i class="bi bi-info-circle me-1"></i>Cascading AJAX <code>/api/wilayah/*</code> aktif di Task 2.6; di sini dropdown Tom Select terisi dummy.</p>
      </div>

      {{-- TAB 4 --}}
      <div x-show="step === 4" x-cloak>
        <h2 class="h6 fw-bold mb-3">Tab 4 — Aktivitas Belajar</h2>
        <div class="row g-2">
          <div class="col-md-4"><label class="form-label small fw-bold">Tahun ajaran</label><select name="academic_year" class="form-select"><option>2025/2026 Ganjil (aktif)</option><option>2024/2025 Genap</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Tanggal masuk</label><input type="date" name="enrollment_date" class="form-control" value="2025-07-14"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Kelas</label><select name="classroom" class="form-select">@foreach ($kelasOptions as $k)<option>{{ $k }}</option>@endforeach</select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Jenis masuk</label><select name="entry_type" class="form-select"><option value="siswa_baru">Siswa baru</option><option value="mutasi_masuk">Mutasi masuk</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Status</label><select name="status" class="form-select">@foreach ($statusOptions as $k => $v)<option value="{{ $k }}">{{ $v }}</option>@endforeach</select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Keterangan (wajib jika mutasi)</label><input name="status_note" class="form-control" placeholder="cth. Mutasi dari SMPN 1 Kajen karena pindah pondok"></div>
        </div>
      </div>

      {{-- TAB 5 --}}
      <div x-show="step === 5" x-cloak>
        <h2 class="h6 fw-bold mb-3">Tab 5 — Beasiswa</h2>
        <div class="table-responsive mb-2">
          <table class="table table-sm small align-middle"><thead class="table-light"><tr><th>Tahun</th><th>Kategori</th><th>Nama</th><th>Lembaga</th><th>Nominal</th></tr></thead>
          <tbody>@foreach ($beasiswa as $b)<tr><td>{{ $b['tahun'] }}</td><td>{{ $b['kategori'] }}</td><td>{{ $b['nama'] }}</td><td>{{ $b['lembaga'] }}</td><td>{{ $b['nominal'] }}</td></tr>@endforeach</tbody></table>
        </div>
        <div class="row g-2">
          <div class="col-md-2"><input class="form-control" placeholder="Tahun" value="2025"></div>
          <div class="col-md-3"><select class="form-select"><option>Beasiswa Berprestasi</option><option>Beasiswa Miskin</option><option>Lainnya</option></select></div>
          <div class="col-md-4"><input class="form-control" placeholder="Nama beasiswa" value="Beasiswa Tahfidz Yayasan"></div>
          <div class="col-md-3"><button type="button" class="btn btn-outline-futuhiyyah btn-sm w-100"><i class="bi bi-plus me-1"></i>Tambah (demo)</button></div>
        </div>
      </div>

      {{-- TAB 6 --}}
      <div x-show="step === 6" x-cloak>
        <h2 class="h6 fw-bold mb-3">Tab 6 — Prestasi Siswa</h2>
        <div class="table-responsive mb-2">
          <table class="table table-sm small align-middle"><thead class="table-light"><tr><th>Tanggal</th><th>Prestasi</th><th>Tingkat</th><th>Penyelenggara</th></tr></thead>
          <tbody>@foreach ($prestasi as $p)<tr><td>{{ $p['tanggal'] }}</td><td>{{ $p['nama'] }}</td><td><span class="badge text-bg-warning text-dark">{{ $p['tingkat'] }}</span></td><td>{{ $p['penyelenggara'] }}</td></tr>@endforeach</tbody></table>
        </div>
        <div class="row g-2">
          <div class="col-md-3"><input type="date" class="form-control" value="2025-08-17"></div>
          <div class="col-md-5"><input class="form-control" placeholder="Nama prestasi" value="Juara 2 MHQ Tingkat KKM"></div>
          <div class="col-md-4"><button type="button" class="btn btn-outline-futuhiyyah btn-sm w-100"><i class="bi bi-plus me-1"></i>Tambah (demo)</button></div>
        </div>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <button type="button" class="btn btn-outline-secondary btn-sm" x-show="step > 1" @click="step--"><i class="bi bi-arrow-left me-1"></i>Kembali</button>
        <span></span>
        <button type="button" class="btn btn-success btn-sm" x-show="step < 6" @click="step++">Lanjut<i class="bi bi-arrow-right ms-1"></i></button>
        <button type="submit" class="btn btn-success" x-show="step === 6"><i class="bi bi-save me-1"></i>Simpan Santri (Demo Fase 1)</button>
      </div>
    </form>
  </div>
</div>
