@extends('layouts.app')

@section('content')
  <div class="container" id="recipie">
    <form action="{{ url('create-recipie') }}" method="post">
      <header class="my-4">
        <input type="text" name="title" class="text-capitalize fw-bold text-dark form-control form-control-lg" required>
        <section class="d-flex mt-2 information">
          <div class="input-group input-group-sm me-2">
            <span class="input-group-text"><i class="fas fa-clock text-secondary"></i></span>
            <select name="cooktime" class="form-select" required>
              <option value="not-chosen" class="text-black-50">Tillagningstid</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="30">30</option>
              <option value="35">35</option>
              <option value="40">40</option>
              <option value="45">45</option>
              <option value="50">50</option>
              <option value="55">55</option>
              <option value="60">60</option>
              <option value="61">&gt;60</option>
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
              <option value="easy">Enkelt</option>
              <option value="medium">Medel</option>
              <option value="hard">Svårt</option>
            </select>
          </div>
        </section>
        <!-- NOT HAPPY WITH THE STYLE OF THIS, HAVE TO FIX IT WITH JAVASCRIPT AND CUSTOM CSS -->
        <select name="tags" multiple>
          @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>
      </header>

      <section class="row">
        <section class="col-sm-7">
          <!-- Description -->
          <textarea class="form-control fw-bold text-body mb-5 fs-5" required></textarea>

          <div class="instruction mb-3">
            <!-- Instructions -->
            <div class="d-flex">
              <textarea name="instruction" class="form-control lh-sm fs-5 d-inline me-3" required></textarea>
              <button class="reset-button fs-4" type="button" id="remove-instructoin">
                <i class="fas fa-times-circle text-danger"></i>
              </button>
            </div>
            <button class="mt-3 p-1 ps-2 pe-2 d-block bg-primary text-white rounded-pill timer" type="button">
              Timer: <input type="text" placeholder="mm:ss"> min
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
            @if (Auth::user()->recipies_is_public)
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
            @else
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
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
            <input class="form-control" type="number" value="4" min="1" max="12">
          </div>
          <section class="mb-4">
            <ul class="list-group ingredient-group">
              <li class="list-group-item bg-primary text-center text-light group-title">
                <input type="text" class="form-control text-center fs-4 p-0" placeholder="Titel" required>
              </li>
              <li class="list-group-item border border-primary d-flex justify-content-between">
                <input list="verified-ingredients" name="ingredient-name" class="form-control fw-bold" placeholder="Namn"
                  required>
                <datalist id="verified-ingredients">
                  @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->ingredient_name }}">
                  @endforeach
                </datalist>
                <input type="number" name="quantity" class="form-control" placeholder="Mängd" min="0" step="any" required>
                <select name="measurement-unit" class="form-select" required>
                  <option value="not-chosen" class="text-black-50">Enhet</option>
                  @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->measurement_name }}</option>
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
