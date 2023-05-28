<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
        <meta name="author" content="Bootlab">

        <link rel="stylesheet" type="text/css" href="{{ asset('lib/css/dark.css') }}" >
        <link rel="stylesheet"  type="text/css" href="{{ asset('lib/sweetalert2/sweetalert2.min.css') }}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body style="font-size: 14px">

        @yield('content')

        <script src="{{ URL::asset('lib/js/app.js') }}"></script>
        <script src="{{ URL::asset('lib/sweetalert2/sweetalert2.min.js') }}"></script>
        @stack('scripts')

        @include('_layout.html_notification')
    </body>
</html>