<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="/" class="d-inline-block"><img src="/backend/assets/images/logo_light.png" alt="">
        </a>

        {{--<ul class="nav navbar-nav pull-right visible-xs-block">--}}
            {{--<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>--}}
            {{--<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>--}}
        {{--</ul>--}}
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>


    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-md-auto">
            @if (config('locale.status') && count(config('locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <a class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="true">
                        @if(config('locale.flags.'.App::getLocale()))<img src="/backend/assets{{config('locale.flags.'.App::getLocale())}}" class="position-left" alt="">@endif
                            {{ trans('menus.language-picker.langs.'.App::getLocale()) }}
                            {{--<i class="caret"></i>--}}
                    </a>
                    @include('includes.partials.lang')
                </li>
            @endif

            <li class="nav-item dropdown dropdown-user">
                <a class="navbar-nav-link d-flex align-items-center dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ $logged_in_user->avatar }}" alt="{{ $logged_in_user->email }}" class="rounded-circle mr-2">
                    <span>{{ $logged_in_user->full_name }}</span>
                    {{--<i class="caret"></i>--}}
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('admin.auth.user.show', $logged_in_user) }}" class="dropdown-item"><i class="icon-user-plus"></i> {{ __('menus.backend.access.my-profile')}}</a>
                    {{--<li class="divider"></li>--}}
                    <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item"><i class="icon-switch2"></i> {{ __('navs.general.logout') }}</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
