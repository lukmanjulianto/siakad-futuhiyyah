{{-- Form 2 tab GTK (PRD Bab 6.E). Dipakai create & edit. --}}
<div x-data="{ tab: 1 }" class="card shadow-sm">
  <div class="card-body p-4">
    <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
      <h1 class="h5 fw-bold mb-0">{{ $isEdit ? 'Ubah GTK: ' . ($row['name'] ?? '') : 'Tambah GTK Baru' }}</h1>
      <span class="badge text-bg-success ms-auto">NIK 16 digit unik • email madrasah ter-encrypt (Task 2.7)</span>
    </div>
    <ul class="nav nav-pills gap-1 mb-3">
      <li class="nav-item"><button type="button" class="btn btn-sm" :class="tab === 1 ? 'btn-success' : 'btn-outline-secondary'" @click="tab = 1">Tab 1 — Data GTK</button></li>
      <li class="nav-item"><button type="button" class="btn btn-sm" :class="tab === 2 ? 'btn-success' : 'btn-outline-secondary'" @click="tab = 2">Tab 2 — Pendidikan Formal</button></li>
    </ul>

    <form method="POST" action="#" enctype="multipart/form-data" onsubmit="return false;">
      @csrf
      <div x-show="tab === 1" x-cloak>
        <div class="row g-2">
          <div class="col-md-4"><label class="form-label small fw-bold">Foto (jpg/png, 2MB)</label><input type="file" class="form-control" accept=".jpg,.jpeg,.png"></div>
          <div class="col-md-8"><label class="form-label small fw-bold">Nama lengkap + gelar *</label><input class="form-control" value="{{ $row['name'] ?? 'Ustadz Ahmad Syauqi, S.Pd' }}" required></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Jenis kelamin</label><select class="form-select"><option>Laki-laki</option><option>Perempuan</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Tempat lahir *</label><input class="form-control" value="Pekalongan" required></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Tanggal lahir *</label><input type="date" class="form-control" value="1990-04-12" required></div>
          <div class="col-md-3"><label class="form-label small fw-bold">NIK (16 digit unik) *</label><input class="form-control" value="{{ $row['nik'] ?? '3322123456780009' }}" pattern="[0-9]{16}" required></div>
          <div class="col-md-4"><label class="form-label small fw-bold">No. KK</label><input class="form-control" value="3322110101900009"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Nama ibu kandung</label><input class="form-control" value="Hj. Fatimah"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Agama</label><select class="form-select"><option>Islam</option><option>Kristen Protestan</option><option>Katolik</option><option>Hindu</option><option>Buddha</option><option>Kong Hu Cu</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Status kepegawaian</label><select class="form-select"><option>Non ASN</option><option>PNS</option><option>PPPK</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">NUPTK</label><input class="form-control" value="1234567890123456"></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Jenis PTK</label><select class="form-select"><option>Guru</option><option>Tendik</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Status</label><select class="form-select">@foreach ($statusOptions as $k => $v)<option value="{{ $k }}">{{ $v }}</option>@endforeach</select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">HP</label><input class="form-control" value="0812-3333-4444"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Email pribadi</label><input type="email" class="form-control" value="syauqi@gmail.com"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Mapel diampu (Tom Select)</label><select class="form-select tom-select" multiple>@foreach ($mapelOptions as $m)<option>{{ $m }}</option>@endforeach</select></div>
          <div class="col-md-6"><label class="form-label small fw-bold">Email Madrasah Hebat</label><input type="email" class="form-control" value="syauqi@mtsfutuhiyyah.sch.id"></div>
          <div class="col-md-6"><label class="form-label small fw-bold">Password email (ter-encrypt)</label><input type="password" class="form-control" value="MadrasahHebat123"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">BPJS Kesehatan</label><input class="form-control" value="0001234567890"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">BPJS Ketenagakerjaan</label><input class="form-control" value="9876543210"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">NPWP</label><input class="form-control" value="09.123.456.7-123.000"></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Gol. darah</label><select class="form-select"><option>O</option><option>A</option><option>B</option><option>AB</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Bank / No. rekening</label><div class="input-group"><input class="form-control" value="BSI"><input class="form-control" value="7212345678"></div></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Status tinggal</label><select class="form-select"><option>Mondok</option><option>Rumah sendiri</option><option>Kontrak</option></select></div>
          <div class="col-md-3"><label class="form-label small fw-bold">Jarak ke madrasah (km)</label><input type="number" step="0.01" class="form-control" value="2.50"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Status kawin</label><select class="form-select"><option>belum kawin</option><option>kawin</option><option>duda_janda</option></select></div>
          <div class="col-md-4"><label class="form-label small fw-bold">Nama pasangan</label><input class="form-control" value="-"></div>
          <div class="col-md-4"><label class="form-label small fw-bold">TMT pegawai / guru</label><div class="input-group"><input type="date" class="form-control" value="2018-07-01"><input type="date" class="form-control" value="2019-07-01"></div></div>
          <div class="col-12"><label class="form-label small fw-bold">Alamat (provinsi → desa, Tom Select)</label>
            <div class="row g-2">
              <div class="col-md-3"><select class="form-select tom-select">@foreach ($wilayah['provinces'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
              <div class="col-md-3"><select class="form-select tom-select">@foreach ($wilayah['regencies'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
              <div class="col-md-3"><select class="form-select tom-select">@foreach ($wilayah['districts'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
              <div class="col-md-3"><select class="form-select tom-select">@foreach ($wilayah['villages'] as $o)<option>{{ $o }}</option>@endforeach</select></div>
              <div class="col-md-12"><input class="form-control" value="Jl. Pesantren No. 8 RT 02/RW 01, Wiradesa, Pekalongan"></div>
            </div>
          </div>
        </div>
        <div class="text-end mt-3"><button type="button" class="btn btn-success btn-sm" @click="tab = 2">Lanjut ke Pendidikan<i class="bi bi-arrow-right ms-1"></i></button></div>
      </div>

      <div x-show="tab === 2" x-cloak>
        <h2 class="h6 fw-bold mb-2">Tab 2 — Pendidikan Formal (ijazah SD s.d. S3)</h2>
        <p class="small text-muted">Unggah satu per satu atau sekaligus (bulk multi-file). Maks 2MB per berkas.</p>
        <div class="mb-2"><label class="form-label small fw-bold">Bulk upload ijazah</label><input type="file" class="form-control" multiple accept=".pdf,.jpg,.jpeg,.png"></div>
        <div class="table-responsive">
          <table class="table table-sm small align-middle">
            <thead class="table-light"><tr><th>Jenjang</th><th>Sekolah/Kampus</th><th>Lulus</th><th>Berkas</th></tr></thead>
            <tbody>
              @foreach ($educations as $e)
                <tr><td><span class="badge text-bg-success">{{ $e['level'] }}</span></td><td>{{ $e['school'] }}</td><td>{{ $e['year'] }}</td><td><span class="badge text-bg-secondary">{{ $e['file'] }}</span> <input type="file" class="form-control form-control-sm mt-1" accept=".pdf,.jpg,.jpeg,.png"></td></tr>
              @endforeach
              <tr><td><span class="badge text-bg-warning text-dark">S2</span></td><td><input class="form-control form-control-sm" value="UIN Walisongo — Magister PAI"></td><td><input class="form-control form-control-sm" value="2024"></td><td><input type="file" class="form-control form-control-sm"></td></tr>
            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <button type="button" class="btn btn-outline-secondary btn-sm" @click="tab = 1"><i class="bi bi-arrow-left me-1"></i>Kembali</button>
          <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Simpan GTK (Demo Fase 1)</button>
        </div>
      </div>
    </form>
  </div>
</div>
