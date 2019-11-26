@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.edit') . ' | ' . __('labels.backend.access.roles.edit'))

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.roles.management') }}</span> - {{ __('labels.backend.access.roles.edit') }}
@endsection

@section ('heading-elements')
    @include('backend.auth.role.includes.header-buttons')
@endsection

@section('content')
    {{ html()->modelcard($role, 'PATCH', route('admin.auth.role.update', $role))->class('card-horizontal')->open() }}
    <div class="card card-flat">

        <div class="card-body">
            <h5 class="card-title">{{ __('labels.backend.access.roles.edit') }}
            </h5>
            <div class="card-group">
                {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                                              ->class('col-lg-2 card-control-label')
                                              ->for('name') }}
                <div class="col-lg-10">
                    {{ html()->text('name')
                        ->class('card-control')
                        ->placeholder(__('validation.attributes.backend.access.roles.name'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                </div>
            </div>

            <div class="card-group">
                {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                    ->class('col-lg-2 card-control-label')
                    ->for('permissions') }}
                <div class="col-lg-10">
                    @if ($permissions->count())
                        @foreach($permissions as $permission)
                            <div class="checkbox checkbox-switchery switchery-xs">
                                {{ html()->label(
                                    html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)
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
                    {{ card_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                    {{ card_submit(__('buttons.general.crud.update')) }}
                </div>
            </div>
        </div>
    </div>
    {{ html()->closeModelcard() }}
@endsection