<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">

        </div>
        <div class="container">
            @include('includes.header')

            @yield('content')

            @yield('js')
        </div>
    </body>
</html>
