@if (!isset($instruction))
    @php
        $instruction = new stdClass;
        $instruction->text = '';
        $instruction->timer = '';
    @endphp
@endif

<div class="instruction mb-3">
    <!-- Instructions -->
    <div class="d-flex form-floating">
    <textarea name="instruction" class="form-control lh-sm fs-5 d-inline me-3" 
                id="instruction"
                placeholder="Instruktion"
                style="height: 5rem;"
                required>{{ old('instruction') ?? $instruction->text }}</textarea>
    <label for="instruction">Instruktion</label>
    <button class="reset-button fs-4" type="button" id="remove-instruction">
        <i class="fas fa-times-circle text-danger"></i>
    </button>
    </div>
    <button class="mt-3 p-1 ps-2 pe-2 d-block bg-primary text-white rounded-pill timer" type="button">
    Timer: <input name="timer" type="text" placeholder="mm:ss" 
    value="{{ old('timer') ?? $instruction->timer }}"> min
    </button>
</div>
