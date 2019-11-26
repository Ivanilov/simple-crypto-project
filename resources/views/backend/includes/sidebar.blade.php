<div class="sidebar sidebar-light sidebar-main sidebar-expand-md ">
    <div class="sidebar-content">


        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#">
                            <img src="{{ $logged_in_user->avatar }}" width="38" height="38" class="rounded-circle" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ $logged_in_user->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="font-size-sm"></i> &nbsp;{{ $logged_in_user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- General -->
                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{ __('menus.backend.sidebar.general') }}</div> <i class="icon-menu" title="{{ __('menus.backend.sidebar.general') }}"></i></li>

                    <li class="nav-item {{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                    {{--<li class="nav-item">--}}
                        <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                            <i class="icon-home4"></i>
                            <span>
							    {{ __('menus.backend.sidebar.dashboard') }}
							</span>
                        </a>
                    </li>

                    <!-- End Of General -->

                    <!-- System -->

                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{ __('menus.backend.sidebar.system') }}</div> <i class="icon-menu" title="{{ __('menus.backend.sidebar.system') }}"></i></li>

                    @if ($logged_in_user->isAdmin())
                        <li class="nav-item nav-item-submenu">

                            <a href="#" class="nav-link">
                                <i class="icon-copy"></i>
                                <span>{{ __('menus.backend.access.title') }}
                                    @if ($pending_approval > 0)
                                        <span class="label bg-warning-400">U</span>@endif
                                </span>
                            </a>

                            <ul class="nav nav-group-sub" data-submenu-title="{{ __('menus.backend.access.title') }}">

                                <li class="nav-item {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}">
                                    <a href="{{ route('admin.auth.user.index') }}" class="nav-link">
                                        {{ __('labels.backend.access.users.management') }}
                                        @if ($pending_approval > 0)
                                            <span class="label bg-warning-400">{{ $pending_approval }}</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="nav-item {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}">
                                    <a href="{{ route('admin.auth.role.index') }}" class="nav-link">
                                        {{ __('labels.backend.access.roles.management') }}
                                    </a>
                                </li>
                        </ul>
                    </li>
                    @endif

                    <li class="nav-item {{ active_class(Active::checkUriPattern('admin/translations')) }}">
                        <a href="/admin/translations" class="nav-link">
                            <i class="fa fa-language"></i> <span>{{ __('menus.backend.sidebar.translations') }}</span>
                        </a>
                    </li>

                    <li class="nav-item nav-item-submenu">

                        <a href="#" class="nav-link">
                            <i class="fa fa-bug"></i>
                            <span>
                                {{ __('menus.backend.log-viewer.main') }}
                             </span>
                        </a>

                        <ul class="nav nav-group-sub" data-submenu-title="{{ __('menus.backend.access.title') }}">

                            <li class="nav-item {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                                <a href="{{ route('log-viewer::dashboard') }}" class="nav-link">
                                    {{ __('menus.backend.log-viewer.dashboard') }}
                                </a>
                            </li>

                            <li class="nav-item {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}">
                                <a href="{{ route('log-viewer::logs.list') }}" class="nav-link">
                                    {{ __('menus.backend.log-viewer.logs') }}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- End Of System -->


                </ul>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
