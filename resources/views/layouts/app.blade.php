<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @routes
    <!-- Scripts -->
    <script src="{{ url('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @guest
            <nav-bar :authenticated="false" 
            :token="'{{ csrf_token() }}'"></nav-bar>
        @else
            <nav-bar :authenticated="{{ Auth::check() | false }}" :token="'{{ csrf_token() }}'" :profile-image="'{{ Storage::url(Auth::user()->profile_pic)}}'"></nav-bar>
        @endguest

        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
