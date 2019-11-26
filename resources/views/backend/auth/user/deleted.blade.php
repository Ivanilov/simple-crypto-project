@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.deleted') . ' | ' . __('labels.backend.access.users.management'))

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.users.management') }}</span> - {{ __('labels.backend.access.users.deleted') }}
@endsection

@section ('heading-elements')
    @include('backend.auth.user.includes.header-buttons')
@endsection

@section('content')
    <div class="card card-flat">

        <div class="card-body">
            <h5 class="card-title">{{ __('labels.backend.access.roles.edit') }}
            </h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.email') }}</th>
                        <th>{{ __('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                        <th>{{ __('labels.backend.access.users.table.other_permissions') }}</th>
                        <th>{{ __('labels.backend.access.users.table.social') }}</th>
                        <th>{{ __('labels.backend.access.users.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if ($users->count())
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->confirmed_label !!}</td>
                                <td>{!! $user->roles_label !!}</td>
                                <td>{!! $user->permissions_label !!}</td>
                                <td>{!! $user->social_buttons !!}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9"><p class="text-center">{{ __('strings.backend.access.users.no_deleted') }}</p></td></tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <div class="heading-elements">
                <span class="heading-text text-semibold">{!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}</span>
                <span class="heading-text pull-right">{!! $users->render() !!}</span>
            </div>
        </div>
    </div>

@endsection
