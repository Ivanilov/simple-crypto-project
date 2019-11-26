@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.change_password') . ' | ' . __('labels.backend.access.users.management'))

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.users.management') }}</span> - {{ __('labels.backend.access.users.change_password') }} <span class="label label-default">#{{$user->id}}: {{ $user->email }}</span>
@endsection

@section ('heading-elements')
    @include('backend.auth.user.includes.header-buttons')
@endsection

@section('heading-toolbar')
    @include('backend.auth.user.includes.user-header-toolbar')
@endsection

@section('content')

    {{ html()->form('PATCH', route('admin.auth.user.change-password.post', $user))->class('form-horizontal')->open() }}
    <div class="card card-flat">


        <div class="card-body">
            <h5 class="card-title"> {{ __('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}
            </h5>
            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label')->for('password') }}

                <div class="col-md-10">
                    {{ html()->password('password')
                        ->class('form-control')
                        ->placeholder( __('validation.attributes.backend.access.users.password'))
                        ->required()
                        ->autofocus() }}
                </div>
            </div>

            <div class="form-group row">
                {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                <div class="col-md-10">
                    {{ html()->password('password_confirmation')
                        ->class('form-control')
                        ->placeholder( __('validation.attributes.backend.access.users.password_confirmation'))
                        ->required() }}
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="heading-elements">
                <div class="heading-btn pull-right">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div>
            </div>
        </div>
    </div>
{{ html()->form()->close() }}
@endsection
