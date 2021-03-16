@extends('layouts.app')

@section('content')
  <div class="container auth-form">
    <h1>Registrera</h1>

    <div>
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-container">
          <label for="name">{{ __('Användarnamn') }}</label>

          <div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="input-container">
          <label for="email">{{ __('E-Post Adress') }}</label>

          <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

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
            <input id="password" type="password" name="password" required autocomplete="new-password">

            @error('password')
              <span role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="input-container">
          <label for="password-confirm">{{ __('Upprepa Lösenord') }}</label>

          <div>
            <input id="password-confirm" type="password" name="password_confirmation" required
              autocomplete="new-password">
          </div>
        </div>

        <div class="input-container">
          <input type="submit" value="Registrera">
        </div>
        <div class="subinfo">
          Har du redan ett konto?
          <a class="small-link" href="{{ route('login') }}">
            Logga in här.
          </a>
        </div>
      </form>
    </div>
  </div>
@endsection
