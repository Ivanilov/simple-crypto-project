@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . app_name())

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.users.management') }}</span>
@endsection

@section ('heading-elements')
    @include('backend.auth.user.includes.header-buttons')
@endsection

@section('content')
    <div class="card card-flat">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-xs">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.email') }}</th>
                        <th>{{ __('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ __('labels.backend.access.users.table.permissions') }}</th>
                        <th>{{ __('labels.backend.access.users.table.social') }}</th>
                        <th>{{ __('labels.backend.access.users.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{!! $user->confirmed_label !!}</td>
                            <td>{!! $user->roles_label !!}
                                @if($user->permissions_label != 'N/A')
                                    <small class="text-muted">(+ <i>{!! $user->permissions_label !!}</i> )</small>
                                @endif
                            </td>
                            <td>{!! $user->social_buttons !!}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td>{!! $user->action_buttons !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="heading-elements">
                <span class="heading-text text-semibold"> {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}</span>
                <span class="heading-text pull-right">{!! $users->render() !!}</span>
            </div>
        </div>
    </div>

@endsection
