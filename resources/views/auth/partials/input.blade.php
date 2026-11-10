{{-- Author: Cristian Bolaños --}}
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ __('auth.'.$name.'_label') }}</label>
    <input id="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name) }}" autocomplete="{{ $autocomplete }}" required aria-describedby="{{ $name }}-error">
    @error($name)
        <div id="{{ $name }}-error" class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
