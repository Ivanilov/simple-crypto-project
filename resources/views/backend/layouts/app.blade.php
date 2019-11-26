<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 EnsoCore Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'EnsoCore')">
    @yield('meta')

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')
    {{ style(mix('css/backend.css','backend')) }}
    @stack('after-styles')

    @stack('before-scripts')
    {!! script(mix('js/core.js','backend')) !!}
    {!! script(mix('js/app.js','backend')) !!}
    {!! script(mix('js/plugins.js','backend')) !!}
    @stack('after-scripts')
</head>


<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

        <div class="page-content">
            @include('backend.includes.sidebar')
            <div class="content-wrapper">
                <div class="page-header page-header-sm">
                    <div class="page-header-content header-elements-md-inline">

                            <div class="page-title d-flex">
                                <h4><i class="icon-arrow-left52 position-left"></i> @yield('page-title')</h4>
                            </div>
                            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                                @yield('heading-elements')
                            </div>
                    </div>
                </div>
                <div class="content">
                    @include('includes.partials.logged-in-as')
                    @include('includes.partials.messages')
                    @yield('heading-toolbar')
                    @yield('content')
                    @include('backend.includes.footer')
                </div>
            </div>

        </div>
</body>
</html>





