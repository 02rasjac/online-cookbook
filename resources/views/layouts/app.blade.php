<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ url('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />

  <!-- Styles -->
  <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">

    <div class="navbar wrapper">
      <header class="container">
        <a href="{{ route('index') }}" class="site-name">Kokboken Online</a>

        <nav>
          <ul>
            <li><a href="">Kokbok</a></li>
            <li><a href="">Planerare</a></li>
            @guest
              <!-- User is a guest -->
              <li>
                <a href="{{ route('login') }}" class="secondary-link">Logga In</a>
              </li>
              <li>
                <a href="{{ route('register') }}" class="primary-link">Registrera</a>
              </li>
            @else
              <!-- User is authenticated -->
              <div class="dropdown-container">
                {{-- ACTIVATOR --}}
                <li>
                  <img src="{{ Storage::url(Auth::user()->profile_pic) }}" alt="Profilbild" class="profile-image" />
                </li>
                {{-- DROPDOWN CONTENT --}}
                <div class="dropdown-content">
                  <a href="{{ route('home') }}"><i class="fas fa-cog"></i>Inställningar</a>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Logga Ut
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </div>
              @endif
            </ul>
          </nav>
        </header>
      </div>

      <main>
        @yield('content')
      </main>

      <footer class="wrapper">
        <div class="container">
          <div class="column">
            <h3>Kontakta Oss</h3>
            <ul>
              <li>
                <a href="mailto:"><i class="fas fa-envelope"></i> example@gmail.com</a>
              </li>
            </ul>
          </div>
          <div class="column">
            <h3>Länkar</h3>
            <ul>
              <li>
                <a href="{{ route('index') }} ">Startsidan</a>
              </li>
              <li>
                <a href="{{ route('register') }}">Registrera</a>
              </li>
              <li>
                <a href="{{ route('login') }}">Logga In</a>
              </li>
              <li>
                <a href="route('cookbook')">Kokbok</a>
              </li>
              <li>
                <a href="route('planer')">Måltidsplanerare</a>
              </li>
            </ul>
          </div>
          <div class="column">
            <h3>Sociala Medier</h3>
            <ul>
              <li>
                <a href="#">Twitter <i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a href="#">Instagram <i class="fab fa-instagram"></i></a>
              </li>
              <li>
                <a href="#">Github <i class="fab fa-github"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="second-footer">
          <p>&copy; Rasmus Jacklin 2021</p>
        </div>
      </footer>
    </div>
  </body>

  </html>
