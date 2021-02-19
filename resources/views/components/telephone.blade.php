<input 
    type="tel"
    class="form-control-plaintext _detail"
    readonly
    name="{{ $name }}"
    data-id="{{ $name }}"
    onclick="editableField('{{ $name }}')" id="{{ $name }}"
    onkeyup="this.value=this.value.replace(/[^\d]/,'')"
    placeholder="9855665324" value="{{ $value ?? '' }}">

@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror