@extends('layouts.app')

@section('content')
<div class="container" id="cookbook">
  <header class="text-center my-4">
    <h1 class="fw-bold">Min Kokbok</h1>
    <div class="header-functions d-flex justify-content-center align-items-center my-4">
      <form action="{{ route('my-cookbook') }}" method="GET" class="me-5">
        <div class="input-group">
          <input name="search" type="text" class="form-control" placeholder="Sök" value="{{ $search }}" required>
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Sök</button>
        </div>
      </form>
      <a href="{{ route('create-recipie') }}" class="link-create-recipie">
        <i class="text-secondary me-1 fas fa-plus-circle"></i> Skapa Recept
      </a>
      </div>
  </header>
  @auth
    {{-- The user has recipies --}}
    @if (count($recipies) > 0)
      <section>
        <div class="d-flex flex-wrap justify-content-around">
          @foreach ($recipies as $recipie)
              <article class="card mb-4 recipie-info">
                {{-- <a href="{{ route('recipie', [$recipie->user->name, $recipie->id]) }}" class="recipie-link">
                  <span></span>
                </a> --}}
                <div class="thumbnail">
                  <img src="{{ Storage::url($recipie->thumbnail) }}" class="card-img-top">
                </div>
                <div class="card-body rounded-top rounded-4">
                  <a href="{{ route('recipie', [$recipie->user->name, $recipie->id]) }}" class="recipie-link">
                    <h5 class="text-capitalize card-title text-center">{{ $recipie->title }}</h5>
                  </a>
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