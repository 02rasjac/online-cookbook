@extends('layouts.app')

@section('content')
<div class="container" id="cookbook">
  <h1>Din Kokbok</h1>
  {{-- The user has no recipies --}}
  @auth
    @if (count($recipies) > 0)
      <section class="d-flex flex-wrap justify-content-between">
        @foreach ($recipies as $recipie)
          <article class="card mb-4 recipie-info">
            <div class="thumbnail">
              <img src="{{ Storage::url($recipie->thumbnail) }}" class="card-img-top">
            </div>
            <div class="card-body rounded-top rounded-4">
              <h5 class="text-capitalize card-title text-center">{{ $recipie->title }}</h5>
              <section class="d-flex mt-2">
                <p class="me-3"><i class="fas fa-clock"></i> {{ $recipie->cook_time }} min</p>
                <p class="me-3"><i class="fab fa-apple"></i> {{ $recipie->numOfIngredients() }} ingredienser</p>
                <p class="me-3">{{ $recipie->difficulty }}</p>
              </section>
              <ul class="list-group list-group-horizontal mt-2 tags">
              @foreach ($recipie->recipieTags as $tag)
                <li class="list-group-item rounded-pill tag" style="background-color: {{ $tag->tag->color }}">{{ $tag->tag->tag_name }}</li>
              @endforeach
              </ul>
              <p class="card-text">{{ $recipie->description }}</p>
              <div class="d-flex justify-content-between align-items-end mt-4 fs-4">
                <a href="{{ route('edit-recipie', ['username' => Auth::user()->name, 'recipie_id' => $recipie->id]) }}">
                  <i class="fas fa-pencil-alt text-secondary" title="Redigera"></i>
                </a>
                <p class="fs-6"><i class="fas fa-star text-secondary"></i> 4.5</p>
                <a href="{{ route('favorite', $recipie->id) }}">
                  <i class="far fa-heart text-black-50" title="Spara"></i>
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </section>
    @else
      <p>Du har inga recept.</p>
    @endif

  @else
    För att börja skapa eller spara recept måste du logga in eller registrera dig.
  @endauth

</div>
@endsection