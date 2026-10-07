@extends('layouts.app')
@section('title', 'Manajemen User & Role — SIAKAD Futuhiyyah')
@section('breadcrumb', 'Users')
@section('content')
@php
  $statusBadge = ['active' => 'success', 'pending' => 'warning', 'suspended' => 'danger'];
@endphp
<div class="card shadow-sm mb-3"><div class="card-body p-4 d-flex flex-wrap gap-2 align-items-center">
  <div><h1 class="h5 fw-bold mb-0">Manajemen User & Role</h1><p class="text-muted small mb-0">Akun Google baru otomatis Guru Mapel (Pending) • Admin verifikasi & atur peran di sini.</p></div>
  <span class="badge text-bg-warning text-dark ms-auto">2 menunggu verifikasi</span>
</div></div>
<div class="card shadow-sm mb-3"><div class="card-body p-3">
  <form method="GET" class="row g-2">
    <div class="col-md-4"><select name="role" class="form-select tom-select" onchange="this.form.submit()"><option value="">Semua peran</option>@foreach ($roles as $k => $v)<option value="{{ $k }}" {{ $filterRole === $k ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
    <div class="col-md-8"><div class="input-group"><input type="search" name="q" class="form-control" placeholder="Cari nama / email…" value="{{ $q }}"><button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button><a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Reset</a></div></div>
  </form>
</div></div>
<div class="card shadow-sm"><div class="card-body p-3"><div class="table-responsive">
  <table id="tabelUsers" class="table table-hover small align-middle w-100">
    <thead class="table-light"><tr><th>Nama / Email</th><th>Peran</th><th>Status</th><th>Login terakhir</th><th class="text-end">Aksi</th></tr></thead>
    <tbody>
      @foreach ($rows as $r)
        <tr>
          <td class="fw-bold">{{ $r['nama'] }}<br><span class="text-muted fw-normal">{{ $r['email'] }}</span></td>
          <td><span class="badge text-bg-success">{{ $roles[$r['role']] }}</span></td>
          <td><span class="badge text-bg-{{ $statusBadge[$r['status']] }}">{{ $r['status'] }}</span></td>
          <td>{{ $r['login'] }}</td>
          <td class="text-end text-nowrap"><button class="btn btn-sm btn-success">Aktifkan</button> <button class="btn btn-sm btn-outline-futuhiyyah">Ubah Peran</button></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div></div></div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (window.$ && $.fn.DataTable) { new DataTable('#tabelUsers', { pageLength: 10 }); }
});
</script>
@endpush
@endsection
