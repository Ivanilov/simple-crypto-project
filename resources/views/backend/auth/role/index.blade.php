@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | '. app_name())

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.roles.management') }}</span>
@endsection

@section ('heading-elements')
    @include('backend.auth.role.includes.header-buttons')
@endsection

@section('content')
    <style>

    </style>
    <div class="card card-flat">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-xs">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('labels.backend.access.roles.table.role') }}</th>
                        <th>{{ __('labels.backend.access.roles.table.permissions') }}</th>
                        <th>{{ __('labels.backend.access.roles.table.number_of_users') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ ucfirst($role->name) }}</td>
                            <td>
                                @if ($role->id == 1)
                                    {{ __('labels.general.all') }}
                                @else
                                    @if ($role->permissions->count())
                                        @foreach ($role->permissions as $permission)
                                            {{ ucwords($permission->name) }}
                                        @endforeach
                                    @else
                                        {{ __('labels.general.none') }}
                                    @endif
                                @endif
                            </td>
                            <td>{{ $role->users->count() }}</td>
                            <td class>{!! $role->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="heading-elements">
                <span class="heading-text text-semibold"> {!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}</span>
                <span class="heading-text pull-right">{!! $roles->render() !!}</span>
            </div>
        </div>
    </div>
@endsection
