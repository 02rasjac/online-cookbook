@extends('layouts.app')

@section('content')
<div class="container" id="cookbook">
  <header class="text-center my-4">
    <h1 class="fw-bold">Min Kokbok</h1>
    <form action="{{ route('my-cookbook') }}" method="GET">
      <div class="input-group my-4 mx-auto w-50">
        <input name="search" type="text" class="form-control" placeholder="Sök" value="{{ $search }}" required>
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Sök</button>
      </div>
    </form>
  </header>
  @auth
    {{-- The user has recipies --}}
    @if (count($recipies) > 0)
      <section>
        <div class="d-flex flex-wrap justify-content-around">
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
                <p class="card-text mt-3">{{ $recipie->description }}</p>
                <div class="d-flex justify-content-between align-items-end fs-4 cookbook-links">
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
        </div>
        <div class="mb-4">
          {{ $recipies->links() }}
        </div>
      </section>
    @else
      <p>Du har inga recept.</p>
    @endif

  @else
    För att börja skapa eller spara recept måste du logga in eller registrera dig.
  @endauth

</div>
@endsection