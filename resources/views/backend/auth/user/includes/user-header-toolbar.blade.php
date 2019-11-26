<div class="navbar navbar-default navbar-component navbar-xs">
    <ul class="nav navbar-nav visible-xs-block">
        <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-filter">
        <ul class="nav navbar-nav">
            <li class="{{ active_class(Active::checkUriPattern(ltrim(route('admin.auth.user.show', $user, false),'/'))) }}"><a href="{{ route('admin.auth.user.show', $user) }}"><i class="fa fa-search position-left"></i> {{ __('buttons.general.crud.view') }}</a></li>
            <li  class="{{ active_class(Active::checkUriPattern(ltrim(route('admin.auth.user.edit', $user, false),'/'))) }}"><a href="{{ route('admin.auth.user.edit', $user) }}" ><i class="fa fa-pencil position-left"></i> {{ __('buttons.general.crud.edit') }}</a></li>
            <li  class="{{ active_class(Active::checkUriPattern(ltrim(route('admin.auth.user.change-password', $user, false),'/'))) }}"><a href="{{ route('admin.auth.user.change-password', $user) }}" ><i class="icon-key position-left"></i> {{ __('buttons.backend.access.users.change_password') }}</a></li>
        </ul>

        @if($user->delete_button != null)
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-gear"></i> <span class="visible-lg-inline-block position-right"> {{ __('buttons.general.options') }}</span> <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>{!! $user->clear_session_button !!}</li>
                            <li>{!! $user->login_as_button !!}</li>
                            <li>{!! $user->status_button !!}</li>
                            <li>{!! $user->confirmed_button !!}</li>
                            <li class="divider"></li>
                            <li>{!! $user->delete_button !!}</li>
                        </ul>
                    </li>

                </ul>
            </div>
        @endif
    </div>
</div>