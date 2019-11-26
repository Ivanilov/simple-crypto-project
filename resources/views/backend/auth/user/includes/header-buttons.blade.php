<a href="{{ route('admin.auth.user.index') }}" class="btn btn-default btn-raised btn-labeled heading-btn mr-3">{{ __('labels.backend.access.users.management') }} <b><i class="icon-list"></i></b></a>

<div class="btn-group">
    <a href="{{ route('admin.auth.user.create') }}"><button type="button" class="btn bg-success btn-raised heading-btn pull-right"><i class="icon-plus3 mr-2"></i>{{ __('labels.backend.access.users.create') }}</button></a>
    <button type="button" class="btn bg-success btn-raised heading-btn pull-right dropdown-toggle" data-toggle="dropdown"></button>
    <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('admin.auth.user.index') }}" class="dropdown-item"><i class="icon-users4"></i>{{ __('menus.backend.access.users.all') }}</a>
        <a href="{{ route('admin.auth.user.create') }}" class="dropdown-item"><i class="icon-file-plus"></i>{{ __('menus.backend.access.users.create') }}</a>
        <a href="{{ route('admin.auth.user.deactivated') }}" class="dropdown-item"><i class="icon-user-lock"></i>{{ __('menus.backend.access.users.deactivated') }}</a>
        <a href="{{ route('admin.auth.user.deleted') }}" class="dropdown-item"><i class="icon-user-cancel"></i>{{ __('menus.backend.access.users.deleted') }}</a>
    </div>
</div>