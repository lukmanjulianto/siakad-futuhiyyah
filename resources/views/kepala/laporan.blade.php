@extends('layouts.app')
@section('title', 'Laporan Kepala Madrasah — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Laporan')
@section('content')
<div class="card shadow-sm mb-3"><div class="card-body p-4">
  <h1 class="h5 fw-bold mb-1">Laporan Akademik & Kesiswaan</h1>
  <p class="text-muted small mb-0">Akses penuh export (read-write laporan, read-only data). Format nama: <code>{jenis}_{tahun-ajaran}_{timestamp}.xlsx/pdf</code>.</p>
</div></div>
<div class="card shadow-sm"><div class="card-body p-4">
  <form method="GET" class="row g-2 mb-3">
    <div class="col-md-5"><label class="form-label small fw-bold">Jenis</label><select name="jenis" class="form-select" onchange="this.form.submit()">@foreach ($jenisOptions as $k => $v)<option value="{{ $k }}" {{ $jenis === $k ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
    <div class="col-md-7 d-flex align-items-end gap-2"><span class="badge text-bg-secondary">{{ $filename }}.xlsx</span><button class="btn btn-success btn-sm" type="submit">Tampilkan</button><button class="btn btn-outline-futuhiyyah btn-sm" type="button">Export Excel</button><button class="btn btn-outline-futuhiyyah btn-sm" type="button">Export PDF</button></div>
  </form>
  <div class="table-responsive"><table class="table table-sm small align-middle"><tbody>
    @foreach ($preview as $p)<tr>@foreach ($p as $c)<td>{{ $c }}</td>@endforeach</tr>@endforeach
  </tbody></table></div>
</div></div>
@endsection
