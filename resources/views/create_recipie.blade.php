@extends('layouts.app')

@section('content')
  <div class="container" id="recipie">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="{{ route('upload.recipie') }}" method="post">
      @csrf
      <header class="my-4">
        <div class="form-floating mb-3">
          <input type="text" name="title" id="title" 
                  class="text-capitalize fw-bold text-dark form-control form-control-lg" 
                  required
                  maxlength="255"
                  placeholder="Title"
                  value="{{ old('title') ?? $recipie->title }}">
          <label for="title">Titel</label>
        </div>
        <section class="d-flex mt-2 information">
          <div class="input-group input-group-sm me-2">
            <span class="input-group-text"><i class="fas fa-clock text-secondary"></i></span>
            <select name="cooktime" class="form-select" id="cooktime" required>
              <option value="not-chosen" class="text-black-50">Tillagningstid</option>
              @foreach ($cooktimes as $time)
                @if ($time % 5 == 0)
                  <option value="{{ $time }}"
                      @if ((old('cooktime') ?? $recipie->cook_time) == $time) selected="selected" @endif
                  >{{ $time }}</option>
                @else
                  <option value="{{ $time }}" 
                      @if ((old('cooktime') ?? $recipie->cook_time) == $time) selected="selected" @endif
                  >&gt;{{ $time - 1 }}</option>
                @endif
              @endforeach
            </select>
            <span class="input-group-text">min</span>
          </div>
          <div class="input-group input-group-sm me-2">
            <span class="input-group-text"><i class="fab fa-apple text-danger"></i></span>
            <input class="form-control" type="text" value="automatiskt" disabled>
            <span class="input-group-text">ingredienser</span>
          </div>
          <div class="input-group input-group-sm me-2">
            <span class="input-group-text text-secondary">*temp*</span>
            <select name="difficulty" class="form-select" required>
              <option value="not-chosen" class="text-black-50">Svårighetsgrad</option>
              <option value="easy" 
                @if ((old('difficulty') ?? $recipie->difficulty) == 'easy') selected="selected" @endif>Enkelt</option>
              <option value="medium" 
                @if ((old('difficulty') ?? $recipie->difficulty) == 'medium') selected="selected" @endif>Medel</option>
              <option value="hard" 
                @if ((old('difficulty') ?? $recipie->difficulty) == 'hard') selected="selected" @endif>Svårt</option>
            </select>
          </div>
        </section>
        <!-- NOT HAPPY WITH THE STYLE OF THIS, HAVE TO FIX IT WITH JAVASCRIPT AND CUSTOM CSS -->
        <select name="tag_id[]" multiple>
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
              {{-- THIS DOESN'T BRING IN THE TAGS THE RECIPIE ALREADY HAS!!! --}}
              @if ((old('tag_id')) && 
                  (in_array($tag->id, (old('tag_id'))))) selected="selected" @endif
            >{{ $tag->tag_name }}</option>
          @endforeach
        </select>
      </header>

      <section class="d-flex">
        <section class="me-4 left-form">
          <!-- Description -->
          <div class="form-floating">
            <textarea name="description" class="form-control fw-bold text-body mb-5 fs-5" 
            required 
            maxlength="1023" 
            minlength="16"
            id="description"
            placeholder="Beskrivning"
            style="height: 10rem;">{{ old('description') ?? $recipie->description }}</textarea>
            <label for="description">Beskrivning</label>
          </div>
          <div class="instruction mb-3">
            <!-- Instructions -->
            <div class="d-flex form-floating">
              <textarea name="instruction" class="form-control lh-sm fs-5 d-inline me-3" 
                        id="instruction"
                        placeholder="Instruktion"
                        style="height: 5rem;"
                        required>{{ old('instruction') ?? $recipie->instruction[0]->text }}</textarea>
              <label for="instruction">Instruktion</label>
              <button class="reset-button fs-4" type="button" id="remove-instruction">
                <i class="fas fa-times-circle text-danger"></i>
              </button>
            </div>
            <button class="mt-3 p-1 ps-2 pe-2 d-block bg-primary text-white rounded-pill timer" type="button">
              Timer: <input name="timer" type="text" placeholder="mm:ss" 
                      value="{{ old('timer') ?? $recipie->instruction[0]->timer }}"> min
            </button>
          </div>
          <div class="instruction mb-3">
            <button class="reset-button fs-5 mt-3" type="button" id="add-instruction">
              <i class="fas fa-plus-circle me-1 text-primary"></i> Lägg till instruktion
            </button>
          </div>
          <div class="form-check form-switch mt-5 fs-5">
            <label class="form-check-label" for="flexSwitchCheckDefault">Privat</label>
            {{-- If the user has set their recipies to public in the settings, it should default to public when creating a new recipie --}}
            @if (Auth::user()->recipies_is_public || (old('isPublic') ?? $recipie->is_public) == 'checked')
              <input name="isPublic" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked value="1">
            @else
              <input name="isPublic" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="0">
            @endif
            <label class="form-check-label" for="flexSwitchCheckDefault">Offentlig</label>
          </div>
          <button class="reset-button fs-5 mt-2" type="submit" title="Öka antalet portioner">
            <i class="fas fa-save me-1 text-primary"></i> Spara
          </button>
        </section>

        <aside class="right-form">
          <div class="input-group input-group-sm mb-2">
            <span class="input-group-text">Antal portioner:</span>
            <input name="portions" class="form-control" type="number" 
                  value="{{ (old('portions') ?? $recipie->portions) ?? 4}}" min="1" max="12">
          </div>
          <section class="mb-4">
            <ul class="list-group ingredient-group">
              <li class="list-group-item bg-primary text-center fs-5 group-title">
                <div class="form-floating">
                  <input name="groups[0][title]" type="text" class="form-control" placeholder="Gruppens Titel" required id="group-title" value="{{ old('groups.0.title') ?? $recipie->ingredientGroup[0]->title }}">
                  <label for="group-title">Gruppens Titel</label>
                </div>
              </li>
              <li class="list-group-item border border-primary d-flex justify-content-between">
                <div class="form-floating input-ing-name">
                  <input list="verified-ingredients" name="groups[0][ingredients][0][name]" 
                        class="form-control fw-bold" 
                        placeholder="Namn" required 
                        value="{{ old('groups.0.ingredient.name') ?? 
                              $recipie->ingredientGroup[0]->groupIngredient[0]->ingredient->ingredient_name }}"
                        id="ingredient-name">
                  <label for="ingredient-name">Namn</label>
                </div>
                <datalist id="verified-ingredients">
                  @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->ingredient_name }}">
                  @endforeach
                </datalist>
                <div class="form-floating input-ing-quantity">
                  <input type="number" name="groups[0][ingredients][0][quantity]" class="form-control" 
                        placeholder="Mängd" min="0" step="any" 
                        value="{{ old('groups.0.ingredient.quantity') ?? 
                                $recipie->ingredientGroup[0]->groupIngredient[0]->quantity}}" 
                        id="ingredient-quantity">
                <label for="ingredient-quantity">Mängd</label>
                </div>
                <select name="groups[0][ingredients][0][measurement_id]" class="form-select input-ing-unit" id="ingredient-measurement">
                  <option value="not-chosen" class="text-black-50">Enhet</option>
                  @foreach ($units as $unit)
                    <option value="{{ $unit->id }}" 
                            @if ((old('groups.0.ingredient.measurement_id') ?? 
                                  $recipie->ingredientGroup[0]->groupIngredient[0]->measurement_unit_id) == $unit->id) 
                                    selected 
                            @endif>
                      {{ $unit->measurement_name }}</option>
                  @endforeach
                </select>
              </li>
            </ul>
          </section>
          <section class="mb-4 text-center align-bottom add-group">
            <button class="reset-button fs-5" type="button" id="add-group">
              <i class="fas fa-plus-circle me-1 text-primary"></i> Lägg till grupp
            </button>
          </section>
        </aside>
      </section>
    </form>
  </div>
@endsection
