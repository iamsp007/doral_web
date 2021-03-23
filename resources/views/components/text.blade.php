<input 
    type="text"
    class="form-control {{ $class ?? '' }}"
    name="{{ $name ?? '' }}"
    value="{{ $value ?? '' }}"
    placeholder="{{ $placeholder ?? str_replace('_','',ucfirst($name)) }}"/>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror