@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.create') . ' | ' . __('labels.backend.access.roles.create'))

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.roles.management') }}</span> - {{ __('labels.backend.access.roles.create') }}
@endsection

@section ('heading-elements')
    @include('backend.auth.role.includes.header-buttons')
@endsection

@section('content'){{ html()->form('POST', route('admin.auth.role.store'))->class('form-horizontal')->open() }}
    <div class="card card-flat">

        <div class="card-body">
            <h5 class="card-title">{{ __('labels.backend.access.roles.create_role_form') }}
            </h5>
            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                        ->class('col-md-2 form-control-label')
                        ->for('name') }}
                <div class="col-lg-10">
                    {{ html()->text('name')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.access.roles.name'))
                        ->attribute('maxlength', 191)
                        ->required()
                        ->autofocus() }}
                </div>
            </div>

            <div class="form-group">
                {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                        ->class('col-md-2 form-control-label')
                        ->for('permissions') }}
                <div class="col-lg-10">
                    @if ($permissions->count())
                        @foreach($permissions as $permission)
                            <div class="checkbox checkbox-switchery switchery-xs">
                                {{ html()->label(
                                    html()->checkbox('permissions[]', false, $permission->name)
                                        ->class('switchery')
                                        ->id('permission-'.$permission->id) . ucwords($permission->name)
                                    )->for('permission-'.$permission->id) }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="heading-elements">
                <div class="heading-btn pull-right">
                    {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div>
            </div>
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
