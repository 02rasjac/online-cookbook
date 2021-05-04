@extends('layouts.app')

@section('content')
<div class="container" id="cookbook">
  <h1>Din Kokbok</h1>
  {{-- The user has no recipies --}}
  @if (!$recipies)
    no recipies
  @else
    <section class="d-flex flex-wrap">
      @foreach ($recipies as $recipie)
        <article class="border border-primary border-3 p-2 recipie-info">
          <h1 class="text-capitalize text-dark">{{ $recipie->title }}</h1>
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
          <p>{{ $recipie->description }}</p>
        </article>
      @endforeach
    </section>
  @endif
</div>
@endsection