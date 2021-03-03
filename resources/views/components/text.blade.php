<input 
    type="text"
    class="form-control{{ $class ?? '' }}"
    name="{{ $name ?? '' }}"
    id="{{ $id ?? $name }}"
    value="{{ $value ?? '' }}"
    placeholder="{{ $placeholder ?? $name }}"/>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror