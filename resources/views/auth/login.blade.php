@extends('layouts.app')

@section('content')
  <div class="container auth-form">
    <h1>Logga In</h1>

    <div>
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-container">
          <label for="email">{{ __('E-Post Adress') }}</label>

          <div>
            <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
              required autocomplete="email" autofocus>

            @error('email')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="input-container">
          <label for="password">{{ __('Lösenord') }}</label>

          <div>
            <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required
              autocomplete="current-password">
            @if (Route::has('password.request'))
              <a class="small-link" href="{{ route('password.request') }}">
                {{ __('Glömt lösenord?') }}
              </a>
            @endif

            @error('password')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="input-container">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          {{-- I would like to make this checkbox like a togglebutton with animation later on --}}

          <label for="remember">
            {{ __('Kom Ihåg Mig') }}
          </label>

        </div>
        <div class="input-container">
          <input type="submit" value="Logga in">
        </div>
        <div id="no-account">
          Har du inget konto?
          <a class="small-link" href="{{ route('register') }}">
            Skapa ett här.
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
