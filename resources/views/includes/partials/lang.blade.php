<div class="dropdown-menu dropdown-menu-right" role="menu">
    @foreach (array_keys(config('locale.languages')) as $lang)
        @if ($lang != App::getLocale())
            <a class="dropdown-item" href="{{ '/lang/'.$lang }}">@if(config('locale.flags.'.$lang)) <img src="/admin/assets/{{ config('locale.flags.'.$lang) }}" alt=""> @endif {{ trans('menus.language-picker.langs.'.$lang) }}</a>
        @endif
    @endforeach
</div>
