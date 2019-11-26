<ul class="list list-unstyled list-group list-group-flush">
    @foreach($log->menu() as $level => $item)
        @if ($item['count'] === 0)
            <li>
                <a>
                    <span class="badge level level-none">
                        {!! $item['icon'] !!} {{ $item['name'] }}
                    </span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $item['url'] }}" class="list-group-item {{ $level }}">
                    <span class="badge level level-{{ $level }}">
                        {!! $item['icon'] !!} {{ $item['name'] }} {{ $item['count'] }}
                    </span>
                </a>
            </li>
        @endif
    @endforeach
</ul>