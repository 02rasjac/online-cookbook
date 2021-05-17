@if (!isset($group))
    @php
        $group = new stdClass;
        $group->title = '';
        $group->groupIngredient[0] = new stdClass;
        $group->groupIngredient[0]->ingredient = new stdClass;
        $group->groupIngredient[0]
              ->ingredient->ingredient_name = '';
        $group->groupIngredient[0]->quantity = '';
        $group->groupIngredient[0]->measurement_unit_id = '';

    @endphp
@endif
<section class="mb-4">
    <ul class="list-group ingredient-group">
      <li class="list-group-item bg-primary text-center fs-5 group-title">
        <div class="form-floating">
          <input name="groups[0][title]" type="text" class="form-control" placeholder="Gruppens Titel" required id="group-title" value="{{ old('groups.0.title') ?? $group->title }}">
          <label for="group-title">Gruppens Titel</label>
        </div>
      </li>
      @foreach ($group->groupIngredient as $ing)
        <li class="list-group-item border border-primary d-flex justify-content-between">
          <div class="form-floating input-ing-name">
            <input list="verified-ingredients" name="groups[0][ingredients][0][name]" 
                  class="form-control fw-bold" 
                  placeholder="Namn" required 
                  value="{{ old('groups.0.ingredient.name') ?? 
                        $ing->ingredient->ingredient_name }}"
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
                          $ing->quantity}}" 
                  id="ingredient-quantity">
          <label for="ingredient-quantity">Mängd</label>
          </div>
          <select name="groups[0][ingredients][0][measurement_id]" class="form-select input-ing-unit" id="ingredient-measurement">
            <option value="not-chosen" class="text-black-50">Enhet</option>
            @foreach ($units as $unit)
              <option value="{{ $unit->id }}" 
                      @if ((old('groups.0.ingredient.measurement_id') ?? 
                            $ing->measurement_unit_id) == $unit->id) 
                              selected 
                      @endif>
                {{ $unit->measurement_name }}</option>
            @endforeach
          </select>
        </li>
      @endforeach
    </ul>
</section>