@if ($breadcrumbs)
    <ul class="breadcrumb position-right">
        <li><i class="icon-home2 position-left"></i> {{ __('labels.backend.breadcrumbs.home') }}</li>
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach

        @yield('breadcrumb-links')
    </ul>
@endif