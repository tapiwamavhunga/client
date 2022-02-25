<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/medinformer-api-client-public.js') }}" defer></script>
<script type='text/javascript' id='medinformer-api-client-js-extra'>
/* <![CDATA[ */
    var ajax = {"url":"https:\/\/practitioner.medinformer.co.za\/ajax.php"};
/* ]]&gt; */
</script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet"> 
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
@include('templates.override')
</head>
<body class="dashboard">
    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>
        <div id="main-wrapper">
            @include('templates.header')
            @include('templates.sidebar')
            <div class="content-body" style="background: #fff !important;">
                @yield('content')
            </div>
        </div>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
