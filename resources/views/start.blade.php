@extends('layouts.landing')

@section('content')
  <header class="hero">
    <img class="hero-image" src="{{ Storage::url('images/food/hero.jpg') }}" alt="(title of the recipie)">
    <div class="container">
      <section class="content">
        <h1>
          Din <strong>kokbok</strong>: Online <br>
          Din <strong>måltidsplanerare</strong>: Online
        </h1>
        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente consectetur animi omnis.
        </p>
        <a href="#about" class="primary-btn">Läs Mer</a>
        <a href="{{ route('register') }}" class="secondary-btn">Skapa Konto</a>
      </section>
      <div class="d-inline-flex align-items-center p-2 recipe">
        <img src="{{ Storage::url('images/profile-images/local-profile-image.png') }}" alt="">
        <div class="d-flex flex-column ms-3 info">
          <p class="recipie-owner">Recept Ägare</p>
          <p class="fs-6 recipie-title">Recept Titel</p>
        </div>
      </div>

  </header>
@endsection
