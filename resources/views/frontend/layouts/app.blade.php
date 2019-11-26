<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="frontend/css/icons/icomoon/icomoon.css" rel="stylesheet" type="text/css">

        @stack('before-styles')
        {{ style('frontend/css/frontend.css') }}
        @stack('after-styles')

        @stack('before-scripts')
        {!! script('frontend/js/core.js') !!}
        {!! script('frontend/js/plugins.js') !!}
        {!! script('frontend/js/app.js') !!}
        {!! script('frontend/js/plugins/jgrowl/jgrowl.min.js') !!}
        @stack('after-scripts')
        @include('frontend.includes.messages')
    </head>
    <body>
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')

            <div class="page-content">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        @include('includes.partials.ga')
    </body>
</html>
