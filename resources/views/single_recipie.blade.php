@extends('layouts.app')

@section('content')
  <h1>{{ $recipie->title }}</h1>
  <section>
    <p><i class="fas fa-clock"></i> {{ $recipie->cook_time }}</p>
    <p><i class="fab fa-apple"></i> {{ $recipie->numOfIngredients() }}</p>
    <p>{{ $recipie->difficulty }}</p>
  </section>
  <p>{{ $recipie->description }}</p>

  <section>
    <h2>Instruktioner</h2>
    @foreach ($recipie->instruction as $instruction)
        <p>{{ $instruction->text }}</p>
        @if ($instruction->timer !== null)
            <button>Timer: {{ $instruction->timer }} min</button>
        @endif
    @endforeach
  </section>

  @if ($recipie->ingredientGroup)
    <aside>
      @foreach ($recipie->ingredientGroup as $group)
        <section>
          <h3>{{ $group->title }}</h3>
          <ul>
            @foreach ($group->groupIngredient as $item)
              <li>{{ $item->ingredient->ingredient_name }} | {{ $item->quantity }}
                {{ $item->measurementUnit->measurement_name }}</li>
            @endforeach
          </ul>
        </section>
      @endforeach
    </aside>
  @endif
@endsection
