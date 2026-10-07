{{-- Breadcrumb dashboard persisten --}}
@php
  $trail = $breadcrumbs ?? null;
@endphp
@if ($trail)
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb small bg-white shadow-sm rounded-3 px-3 py-2 mb-3">
      @foreach ($trail as $i => $crumb)
        @if ($i < count($trail) - 1)
          <li class="breadcrumb-item"><a href="{{ $crumb['url'] ?? '#' }}" class="text-decoration-none">{{ $crumb['label'] }}</a></li>
        @else
          <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
        @endif
      @endforeach
    </ol>
  </nav>
@elseif (View::hasSection('breadcrumb'))
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb small bg-white shadow-sm rounded-3 px-3 py-2 mb-3">
      <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
    </ol>
  </nav>
@endif
