@extends('layouts.landing')

@section('content')
  <div class="hero">
    <img class="hero-image" src="{{ Storage::url('images/food/hero.jpg') }}" alt="(title of the recipie)">
    <div class="container content">
      <h1>
        Din <strong>kokbok</strong>: Online <br>
        Din <strong>måltidsplanerare</strong>: Online
      </h1>
      <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente consectetur animi omnis.</p>
      <a href="#about" class="primary-btn">Läs Mer</a>
      <a href="{{ route('register') }}" class="secondary-btn">Skapa Konto</a>
    </div>
  </div>
@endsection
