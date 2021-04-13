@extends('layouts.app')

@section('content')
  <h1>{{ $recipie->title }}</h1>
  <p>{{ $recipie->description }}</p>
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
