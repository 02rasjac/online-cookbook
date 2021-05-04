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
        <input type="text" name="title" class="text-capitalize fw-bold text-dark form-control form-control-lg" 
                required
                maxlength="255"
                value="{{ old('title') }}">
        <section class="d-flex mt-2 information">
          <div class="input-group input-group-sm me-2">
            <span class="input-group-text"><i class="fas fa-clock text-secondary"></i></span>
            <select name="cooktime" class="form-select" required>
              <option value="not-chosen" class="text-black-50">Tillagningstid</option>
              @foreach ($cooktimes as $time)
                @if ($time % 5 == 0)
                  <option value="{{ $time }}"
                      @if (old('cooktime') == $time) selected="selected" @endif
                  >{{ $time }}</option>
                @else
                  <option value="{{ $time }}" 
                      @if (old('cooktime') == $time) selected="selected" @endif
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
              <option value="easy"   @if (old('difficulty') == 'easy') selected="selected" @endif>Enkelt</option>
              <option value="medium" @if (old('difficulty') == 'medium') selected="selected" @endif>Medel</option>
              <option value="hard"   @if (old('difficulty') == 'hard') selected="selected" @endif>Svårt</option>
            </select>
          </div>
        </section>
        <!-- NOT HAPPY WITH THE STYLE OF THIS, HAVE TO FIX IT WITH JAVASCRIPT AND CUSTOM CSS -->
        <select name="tag_id[]" multiple>
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
              @if (old('tag_id') && in_array($tag->id, old('tag_id'))) selected="selected" @endif>
              {{ $tag->tag_name }}
            </option>
          @endforeach
        </select>
      </header>

      <section class="row">
        <section class="col-sm-7">
          <!-- Description -->
          <textarea name="description" class="form-control fw-bold text-body mb-5 fs-5" 
                    required 
                    maxlength="1023" 
                    minlength="16">{{ old('description') }}</textarea>

          <div class="instruction mb-3">
            <!-- Instructions -->
            <div class="d-flex">
              <textarea name="instruction" class="form-control lh-sm fs-5 d-inline me-3" 
                        required>{{ old('instruction') }}</textarea>
              <button class="reset-button fs-4" type="button" id="remove-instructoin">
                <i class="fas fa-times-circle text-danger"></i>
              </button>
            </div>
            <button class="mt-3 p-1 ps-2 pe-2 d-block bg-primary text-white rounded-pill timer" type="button">
              Timer: <input name="timer" type="text" placeholder="mm:ss" value="{{ old('timer') }}"> min
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
            @if (Auth::user()->recipies_is_public || old('isPublic') == 'checked')
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

        <aside class="col-md-5">
          <div class="input-group input-group-sm mb-2">
            <span class="input-group-text">Antal portioner:</span>
            <input name="portions" class="form-control" type="number" value="{{ old('portions') ? old('portions') : 4 }}" min="1" max="12">
          </div>
          <section class="mb-4">
            <ul class="list-group ingredient-group">
              <li class="list-group-item bg-primary text-center text-light group-title">
                <input name="groups[0][title]" type="text" class="form-control text-center fs-4 p-0" placeholder="Titel" required value="{{ old('groups.0.title') }}">
              </li>
              <li class="list-group-item border border-primary d-flex justify-content-between">
                <input list="verified-ingredients" name="groups[0][ingredients][0][name]" class="form-control fw-bold" placeholder="Namn"
                  required value="{{ old('groups.0.ingredient.name') }}">
                <datalist id="verified-ingredients">
                  @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->ingredient_name }}">
                  @endforeach
                </datalist>
                <input type="number" name="groups[0][ingredients][0][quantity]" class="form-control" placeholder="Mängd" min="0" step="any" value="{{ old('groups.0.ingredient.quantity') }}">
                <select name="groups[0][ingredients][0][measurement_id]" class="form-select">
                  <option value="not-chosen" class="text-black-50">Enhet</option>
                  @foreach ($units as $unit)
                    <option value="{{ $unit->id }}" @if (old('groups.0.ingredient.measurement_id') == $unit->id) selected @endif>
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
