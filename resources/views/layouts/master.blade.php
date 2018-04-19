<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>IT Link USA - @yield('title')</title>

        <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
        <script type="text/javascript" src="{{ mix('js/jquery.min.js') }}"></script>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" >
        <link href="{{ mix('css/dt.css') }}" rel="stylesheet" >
    </head>

    <body>

    <header>
        @yield('nav.affix')
        @yield('nav.barr')
    </header>

        <div class="container">
            <div id="main" class="row">

                <!-- massage content -->
                @yield('massage')

                <!-- massage content -->
                @yield('about')

                <!-- sidebar content -->
                @yield('sidebar.left')

                <!-- main content -->
                @yield('content')

                <!-- expansion content -->
                @yield('sidebar.right')

            </div>
        </div>

    <footer>
        <!-- @ yield('footer') -->
        @include('layouts.footer')
    </footer>

    </body>

</html>