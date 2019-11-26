@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section ('page-title')
    <span class="text-semibold">{{ __('labels.backend.access.users.management') }}</span> - {{ __('labels.backend.access.users.view') }} <span class="label label-default">#{{$user->id}}: {{ $user->email }}</span>
@endsection

@section ('heading-elements')
    @include('backend.auth.user.includes.header-buttons')
@endsection

@section('heading-toolbar')
    @include('backend.auth.user.includes.user-header-toolbar')
@endsection

@section('content')
    <div class="card card-flat">
        <div class="card-body">

            <div class="row">
                <div class="col-md-3">
                    @include('backend.auth.user.includes.user-block')
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm table-borderless">
                                    <thead>
                                        <tr class="border-bottom-indigo">
                                            <th colspan="2">{{ __('labels.backend.access.users.tabs.content.overview.main') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ __('labels.backend.access.users.tabs.content.overview.status') }}</th>
                                            <td>{!! $user->status_label !!}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('labels.backend.access.users.tabs.content.overview.confirmed') }}</th>
                                            <td>{!! $user->confirmed_label !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('labels.backend.access.users.tabs.content.overview.created_at') }}</td>
                                            <td>{{ $user->updated_at->timezone(get_user_timezone()) }} ({{ $user->created_at->diffForHumans() }}),</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('labels.backend.access.users.tabs.content.overview.last_updated') }}</td>
                                            <td>{{ $user->created_at->timezone(get_user_timezone()) }} ({{ $user->updated_at->diffForHumans() }})</td>
                                        </tr>
                                        @if ($user->trashed())
                                            <tr>
                                                <td>{{ __('labels.backend.access.users.tabs.content.overview.deleted_at') }}</td>
                                                <td>{{ $user->deleted_at->timezone(get_user_timezone()) }} ({{ $user->deleted_at->diffForHumans() }})</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>Social buttons</td>
                                            <td>{!! $user->social_buttons !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm table-borderless">
                                    <thead>
                                    <tr class="border-bottom-indigo">
                                        <th colspan="2">{{ __('labels.backend.access.users.tabs.content.overview.access') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{ __('labels.backend.access.users.tabs.content.overview.roles') }}</th>
                                        <td>{!! $user->roles_label !!} </td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('labels.backend.access.users.tabs.content.overview.permissions') }}</th>
                                        <td>{!! $user->permissions_label !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '#avatar-change', function(e){
                e.preventDefault();

                $('#avatar-upload').click();
            });

            $('body').on('click', '#avatar-remove', function(e){
                e.preventDefault();
                $('.user-block').block(defaultBlockUiSettings);
                $.ajax({
                    url: '{{ route("admin.auth.user.avatar.remove", $user->id) }}',
                    type: 'POST',
                    dataType: 'text',
                    processData: false,
                    contentType: false,
                    async: false,
                    data: '',
                    success: function (response) {
                        $('.user-block').unblock();
                        if(response) {
                            $('.user-block').html(response)
                        }
                    },
                    error :function( jqXhr ) {
                        if( jqXhr.status === 422 ) {
                            var errors = jqXhr.responseJSON;
                            errorsHtml = '<ul>';

                            $.each( errors , function( key, value ) {
                                errorsHtml += '<li>' + value[0] + '</li>';
                            });
                            errorsHtml += '</ul>';

                            $.jGrowl(errorsHtml, {
                                header: '{{ trans("backend.messages.user.avatar.data_error") }}',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });

                        } else if( jqXhr.status === 403 ) {
                            $.jGrowl('{{ trans("backend.messages.user.avatar.not_allowed") }}', {
                                header: '{{ trans("dashboard.avatar.not_allowed_data_error") }}',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });
                        } else if( jqXhr.status === 401 ) {
                            $.jGrowl('{{ trans("backend.messages.user.avatar.please_log_in") }}', {
                                header: '{{ trans("dashboard.avatar.auth_data_error") }}',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });
                        } else {
                            $.jGrowl('Something went wrong! Please contact us!', {
                                header: 'Data error',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });
                        }
                        $('.user-block').unblock();
                    }
                });
            });

            $('body').on('change', '#avatar-upload', function(e){
                e.preventDefault();
                var form_data = new FormData;
                form_data.append('file', $('#avatar-upload').prop('files')[0]);

                $.ajax({
                    url: '{{ route("admin.auth.user.avatar.upload", $user->id) }}',
                    type: 'POST',
                    dataType: 'text',
                    processData: false,
                    contentType: false,
                    async: false,
                    data: form_data,

                    beforeSend: function() {
                        $('.user-block').block(defaultBlockUiSettings);
                    },
                    success: function (response) {
                        $('.user-block').unblock();
                        if(response) {
                            $('.user-block').html(response)
                        }
                    },
                    error :function( jqXhr ) {
                        if( jqXhr.status === 422 ) {
                            var errors = jqXhr.responseJSON;
                            errorsHtml = '<ul>';

                            $.each( errors , function( key, value ) {
                                errorsHtml += '<li>' + value[0] + '</li>';
                            });
                            errorsHtml += '</ul>';

                            $.jGrowl(errorsHtml, {
                                header: '{{ trans("backend.messages.user.avatar.data_error") }}',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });

                        } else if( jqXhr.status === 403 ) {
                            $.jGrowl('{{ trans("backend.messages.user.avatar.not_allowed") }}', {
                                header: '{{ trans("dashboard.avatar.not_allowed_data_error") }}',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });
                        } else if( jqXhr.status === 401 ) {
                            $.jGrowl('{{ trans("backend.messages.user.avatar.please_log_in") }}', {
                                header: '{{ trans("dashboard.avatar.auth_data_error") }}',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });
                        } else {
                            $.jGrowl('Something went wrong! Please contact us!', {
                                header: 'Data error',
                                theme: 'alert-bordered alert-styled-right alert-danger'
                            });
                        }
                        $('.user-block').unblock();
                    }
                });
            });
        });
    </script>
@endpush