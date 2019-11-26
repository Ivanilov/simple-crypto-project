@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.create') . ' | ' . __('labels.backend.access.users.management'))

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.users.management') }}</span> - {{ __('labels.backend.access.users.create') }}
@endsection

@section ('heading-elements')
    @include('backend.auth.user.includes.header-buttons')
@endsection

@section('content')

    {{ html()->form('POST', route('admin.auth.user.store'))->class('form-horizontal')->open() }}

        <div class="card card-flat">

            <div class="card-body">
                <h5 class="card-title">{{ __('labels.backend.access.users.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.users.create') }}</small>
                </h5>
                <div class="row">
                    <div class="col-md-6">
                        <legend class="text-bold">{{ __('labels.backend.access.users.basic_information') }}</legend>
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-3 form-control-label')->for('first_name') }}

                            <div class="col-md-9">
                                {{ html()->text('first_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-3 form-control-label')->for('last_name') }}

                            <div class="col-md-9">
                                {{ html()->text('last_name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-3 form-control-label')->for('email') }}

                            <div class="col-md-9">
                                {{ html()->email('email')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.email'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-3 form-control-label')->for('password') }}

                            <div class="col-md-9">
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.password'))
                                    ->required() }}
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-3 form-control-label')->for('password_confirmation') }}

                            <div class="col-md-9">
                                {{ html()->password('password_confirmation')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.users.password_confirmation'))
                                    ->required() }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.backend.access.users.timezone'))->class('col-md-3')->for('timezone') }}

                            <div class="col-md-9">
                                <select name="timezone" id="timezone" class="select" required="required">
                                    @foreach (timezone_identifiers_list() as $timezone)
                                        <option value="{{ $timezone }}" {{ $timezone == 'Europe/Kiev' ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-switchery switchery-xs">
                                    {{ html()->label(
                                            html()->checkbox('active', true, '1')
                                                  ->class('switchery') .__('validation.attributes.backend.access.users.active')) }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox checkbox-switchery switchery-xs">
                                    {{ html()->label(
                                            html()->checkbox('confirmed', true, '1')
                                                  ->class('switchery') . __('validation.attributes.backend.access.users.confirmed')) }}
                                </div>
                            </div>
                            @if (! config('access.users.requires_approval'))
                                <div class="col-md-12">
                                    <div class="checkbox checkbox-switchery switchery-xs">
                                        {{ html()->label(
                                               html()->checkbox('confirmation_email', true, '1')
                                                      ->class('switchery') . __('validation.attributes.backend.access.users.send_confirmation_email')) }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <legend class="text-bold">{{ __('labels.backend.access.users.access_permissions') }}</legend>
                                @if ($roles->count())
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                                            <th>{{ __('labels.backend.access.users.table.permissions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td width="35%">
                                                    <div class="checkbox checkbox-switchery switchery-xs">
                                                        {{ html()->label(
                                                                html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                      ->class('switchery')
                                                                      ->id('role-'.$role->id) . ucwords($role->name))
                                                            ->for('role-'.$role->id) }}
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($role->id != 1)
                                                        @if ($role->permissions->count())
                                                            <i class="text-muted">
                                                            @foreach ($role->permissions as $permission)
                                                                <i class="fa fa-check-circle-o"></i> {{ ucwords($permission->name) }}
                                                            @endforeach
                                                            </i>
                                                        @else
                                                            <i class="text-muted">{{ __('labels.general.none') }}</i>
                                                        @endif
                                                    @else
                                                        <strong class="text-muted">{{ __('labels.backend.access.users.all_permissions') }}</strong>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td width="35%">{{ __('labels.backend.access.users.other_permissions') }}</td>
                                            <td>
                                                @if ($permissions->count())
                                                    @foreach($permissions as $permission)
                                                        <div class="checkbox checkbox-switchery switchery-xs">
                                                            {{ html()->label(
                                                                    html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                                          ->class('switchery')
                                                                           ->id('permission-'.$permission->id) . ucwords($permission->name))
                                                                 ->for('permission-'.$permission->id) }}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="heading-elements">
                    <div class="heading-btn pull-right">
                        {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div>
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}
@endsection
