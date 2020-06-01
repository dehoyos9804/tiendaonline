<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel="stylesheet">
    <link href='{{url("ecaps")}}/assets/plugins/bootstrap/css/bootstrap.min.css' rel="stylesheet">
    <link href='{{url("ecaps")}}/assets/plugins/font-awesome/css/font-awesome.min.css' rel="stylesheet">
    <link href='{{url("ecaps")}}/assets/plugins/icomoon/style.css' rel="stylesheet">
    <link href='{{url("ecaps")}}/assets/plugins/uniform/css/default.css' rel="stylesheet"/>
    <link href='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.css' rel="stylesheet"/>
      
    <!-- Theme Styles -->
    <link href='{{url("ecaps")}}/assets/css/ecaps.css' rel="stylesheet">
    <link href='{{url("ecaps")}}/assets/css/custom.css' rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Javascripts -->
    <script src='{{url("ecaps")}}/assets/plugins/jquery/jquery-3.1.0.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/bootstrap/js/bootstrap.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/uniform/js/jquery.uniform.standalone.js'></script>
    <script src='{{url("ecaps")}}/assets/plugins/switchery/switchery.min.js'></script>
    <script src='{{url("ecaps")}}/assets/js/ecaps.min.js'></script>
</body>
</html>
