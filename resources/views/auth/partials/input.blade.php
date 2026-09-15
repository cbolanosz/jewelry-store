{{-- Author: Cristian Bolaños --}}
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ __('user.'.$name) }}</label>
    <input id="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name) }}" autocomplete="{{ $autocomplete }}" required>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
