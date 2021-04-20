@extends('layouts.app')

@section('content')
  <div class="container" id="recipie">
    <header class="my-4">
      <h1 class="text-capitalize fw-bold text-dark">{{ $recipie->title }}</h1>
      <section class="d-flex mt-2">
        <p class="me-3"><i class="fas fa-clock"></i> {{ $recipie->cook_time }} min</p>
        <p class="me-3"><i class="fab fa-apple"></i> {{ $recipie->numOfIngredients() }} ingredienser</p>
        <p class="me-3">{{ $recipie->difficulty }}</p>
      </section>
      <ul class="list-group list-group-horizontal mt-2 tags">
        @foreach ($recipie->recipieTags as $tag)
          <li class="list-group-item" style="background-color: {{ $tag->tag->color }}">{{ $tag->tag->name }}</li>
        @endforeach
      </ul>
    </header>

    <section class="row">
      <section class="col-sm-8">
        <p class="fw-bold text-body mb-5 fs-5">{{ $recipie->description }}</p>

        @foreach ($recipie->instruction as $instruction)
          <div class="instruction mb-3">
            <div class="d-inline-block">
              <input class="align-middle me-1" type="checkbox" id="inst-{{ $instruction->id }}"
                name="inst-{{ $instruction->id }}">
              <label for="inst-{{ $instruction->id }}" class="lh-sm fs-5 d-inline">{{ $instruction->text }}</label>
            </div>
            @if ($instruction->timer !== null)
              <button class="mt-2 d-block timer">Timer: {{ $instruction->timer }} min</button>
            @endif
          </div>
        @endforeach
      </section>

      @if ($recipie->ingredientGroup)
        <aside class="col-md-4">
          <p class="text-center mb-1 portions">
            <button id="decrease-portions" title="Minska antalet portioner"><i class="fas fa-minus-circle"></i></button>
            <span id="portions">{{ $recipie->portions }}</span> portioner
            <button id="increase-portions" title="Öka antalet portioner"><i class="fas fa-plus-circle"></i></button>
          </p>
          @foreach ($recipie->ingredientGroup as $group)
            <section class="mb-4">
              <ul class="list-group ingredient-group">
                <li class="list-group-item bg-primary text-center text-light group-title">
                  <h3 class="fw-bold">{{ $group->title }}</h3>
                </li>
                @foreach ($group->groupIngredient as $item)
                  <li class="list-group-item border border-primary d-flex justify-content-between">
                    <p class="fw-bold">{{ $item->ingredient->ingredient_name }}</p>
                    <p>{{ $item->quantity }} {{ $item->measurementUnit->measurement_name }}</p>
                  </li>
                @endforeach
              </ul>
            </section>
          @endforeach
        </aside>
      @endif
    </section>
  </div>
@endsection
