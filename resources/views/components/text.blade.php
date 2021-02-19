<input 
    type="text"
    class="form-control"
    name="{{ $name ?? '' }}"
    id="{{ $id ?? '' }}"
    value="{{ $value ?? '' }}" />

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror