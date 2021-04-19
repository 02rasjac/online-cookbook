@extends('layouts.app')

@section('content')
  <div class="container" id="recipie">
    <header class="my-4">
      <h1 class="text-capitalize">{{ $recipie->title }}</h1>
      <section class="d-flex">
        <p class="me-3"><i class="fas fa-clock"></i> {{ $recipie->cook_time }} min</p>
        <p class="me-3"><i class="fab fa-apple"></i> {{ $recipie->numOfIngredients() }} ingredienser</p>
        <p class="me-3">{{ $recipie->difficulty }}</p>
      </section>
    </header>

    <section class="row">
      <section class="col-sm-8">
        <p class="fw-bold">{{ $recipie->description }}</p>

        <h2>Instruktioner</h2>
        @foreach ($recipie->instruction as $instruction)
            <p>{{ $instruction->text }}</p>
            @if ($instruction->timer !== null)
                <button>Timer: {{ $instruction->timer }} min</button>
            @endif
        @endforeach
      </section>
  
      @if ($recipie->ingredientGroup)
        <aside class="col-md-4">
          @foreach ($recipie->ingredientGroup as $group)
            <section class="mb-4">
              <ul class="list-group ingredient-group">
                <li class="list-group-item bg-primary text-center text-light group-title"><h3 class="fw-bold">{{ $group->title }}</h3></li>
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
