<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

        @include('layouts.nav')

        <noscript>
            <strong>
                We're sorry but this app doesn't work properly without
                JavaScript enabled. Please enable it to continue.
            </strong>
        </noscript>

        <div id="app" class="flex-block h-100">

            @yield('content')

        </div>

        @include('layouts.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
