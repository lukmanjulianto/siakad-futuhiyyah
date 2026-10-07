@extends('layouts.app')
@section('title', 'Setting Jadwal ' . $tpl['nama'] . ' — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Setting Jadwal')
@section('content')
<div class="card shadow-sm mb-3">
  <div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
    <div>
      <h1 class="h5 fw-bold mb-0">Setting: {{ $tpl['nama'] }}</h1>
      <p class="text-muted small mb-0">{{ $tpl['ta'] }} • contoh kelas VII-A, jam ke 1–6 • validasi bentrok guru aktif di Task 2.8. Jumat libur, tidak ada kolom Jumat.</p>
    </div>
    <a href="{{ route('admin.akademik.jadwal') }}" class="btn btn-outline-secondary btn-sm ms-auto"><i class="bi bi-arrow-left me-1"></i>Template</a>
  </div>
</div>

<div class="card shadow-sm mb-3">
  <div class="card-body p-3">
    <form class="row g-2" onsubmit="return false;">
      <div class="col-md-2"><label class="form-label small fw-bold">Hari</label><select class="form-select">@foreach ($days as $d)<option>{{ $d }}</option>@endforeach</select></div>
      <div class="col-md-2"><label class="form-label small fw-bold">Jam ke</label><select class="form-select">@foreach ($periods as $p)<option>{{ $p }}</option>@endforeach</select></div>
      <div class="col-md-3"><label class="form-label small fw-bold">Mapel</label><select class="form-select tom-select">@foreach ($mapelOptions as $m)<option>{{ $m }}</option>@endforeach</select></div>
      <div class="col-md-2"><label class="form-label small fw-bold">Kelas</label><select class="form-select tom-select">@foreach ($kelasOptions as $k)<option>{{ $k }}</option>@endforeach</select></div>
      <div class="col-md-3 d-flex align-items-end"><button class="btn btn-success btn-sm w-100"><i class="bi bi-plus me-1"></i>Tambah Slot (Demo)</button></div>
    </form>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body p-3">
    <div class="table-responsive">
      <table class="table table-bordered small align-middle mb-0">
        <thead class="table-light"><tr><th>Jam</th>@foreach ($days as $d)<th>{{ $d }}</th>@endforeach</tr></thead>
        <tbody>
          @foreach ($periods as $p)
            <tr>
              <th class="table-light">Ke-{{ $p }}</th>
              @foreach ($days as $d)
                @php $c = $grid[$d][$p] ?? null; @endphp
                <td style="min-width:140px;">
                  @if ($c)
                    <div class="border rounded-2 p-2 bg-white shadow-sm" draggable="true" title="Seret untuk memindah (demo)">
                      <p class="fw-bold mb-0">{{ $c['mapel'] }}</p>
                      <p class="text-muted mb-1">{{ $c['guru'] }} • VII-A</p>
                      <div class="d-flex gap-1"><button class="btn btn-sm btn-outline-secondary py-0">Pindah</button><button class="btn btn-sm btn-outline-danger py-0">Hapus</button></div>
                    </div>
                  @else
                    <span class="text-muted">— kosong —</span>
                  @endif
                </td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="small text-muted mb-0 mt-2"><i class="bi bi-info-circle me-1"></i>Grid drag/drop-style: seret kartu antar sel (demo visual Fase 1, logika bentrok di Task 2.8). Tidak ada kolom Jumat karena libur.</p>
  </div>
</div>
@endsection
